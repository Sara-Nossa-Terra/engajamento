<?php

namespace App\Http\Controllers;

use App\Models\{PessoasAjudadas, Atividades};
use App\Http\Resources\AtividadesResource;
use App\Http\Requests\{GetAtividadeFormRequest, StoreUpdateAtividadesFormRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtividadesController extends Controller
{
    public static function index(Request $request)
    {
        if ( $request->ajax() )
            return self::lista();

        return view('atividades.index');
    }

    public static function lista()
    {
        $atividades = Atividades::orderBy('tx_nome', 'ASC')->get()->toArray();

        $atividades = array_map(function ($atividades) {
            $atividades['dt_dia'] = (new \DateTime($atividades['dt_dia']))->format('d/m/Y  H:i');

            return $atividades;
        }, $atividades);

        return AtividadesResource::collection($atividades);
    }

    public function create()
    {
        return view('atividades.create');
    }

    public function store(StoreUpdateAtividadesFormRequest $request)
    {
        $atividades = new Atividades();
        $atividades->fill($request->toArray());
        $atividades->save();

        return redirect()->route('atividades.index')->withSuccess('Cadastro realizado com sucesso');
    }

    public function show($id)
    {
        $category = Atividades::findById($id);

        if (!$category)
            return redirect()->back();

        return view('admin.categories.show', compact('category'));
    }

    public function edit($id)
    {
        if (!$atividades = Atividades::findOrFail($id) )
            return redirect()->back()->with('message', 'Não foi possível editar o registro !');

        return view('atividades.edit', compact('atividades'));
    }

    public function update(StoreUpdateAtividadesFormRequest $request, $id)
    {
        if (!$atividades = Atividades::findOrFail($id) )
            return redirect()->back()->with('message', 'Não foi possível atualizar o registro !');

        $atividades->fill($request->toArray());
        $atividades->save();

        return redirect()
            ->route('atividades.index')
            ->withSuccess('Cadastro atualizado com sucesso !');
    }

    public function destroy($id)
    {
        if (!$atividades = Atividades::where('id', $id)->first() )
            return redirect()->back()->with('message', 'Não foi possível excluír o registro !');

        $atividades->fill(["deleted_id" => auth()->user()->id]);
        $atividades->save();
        $atividades->delete();

        return redirect()->route('atividades.index')->withSuccess('Cadastro excluído com sucesso !');
    }

    /**
     * Retorna lista de Atividades de acordo pela data filtrada.
     *
     * @param GetAtividadeFormRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAtividadesPorFiltro(GetAtividadeFormRequest $request)
    {
        $retorno = array();
        $dt_begin = $request['dt_begin'];
        $dt_until = $request['dt_until'];
        $lider_id = auth()->user()->id;
        $pessoas = PessoasAjudadas::where('lider_id', $lider_id)->get()->toArray();

        foreach ((array)$pessoas as $pessoa) {
            $retorno['pessoasAjudadas'][$pessoa['id']] = $pessoa;
            # filtra as Atividades verificando se foi realizada a "chamada";
            $atividades = Atividades::select(
                DB::raw("(
                    SELECT
                        id
                    FROM tb_atividades_pessoas
                    WHERE
                        deleted_at IS NULL
                        AND atividade_id = tb_atividades.id
                        AND pessoa_id = ". $pessoa['id']. "
                        AND dt_periodo BETWEEN '". $dt_begin. "'
                        AND '". $dt_until. "'
                        LIMIT 1) AS thumbsup"),
                    "tb_atividades.id",
                    "tb_atividades.tx_nome",
                    "tb_atividades.dt_dia"
                )
                ->orderBy("tb_atividades.dt_dia", 'ASC')
                ->get();

            foreach($atividades as $atividade) {
                $retorno['pessoasAjudadas'][$pessoa['id']]['atividade'][] = $atividade;
            }
        }

        # Busca Atividades
        $retorno['atividades'][] = Atividades::orderBy('dt_dia', 'ASC')->get();

        # Busca Dado para Totalizador
        $retorno['totalizador'] = DB::table("tb_atividades_pessoas as p")
            ->join("tb_pessoas as tp", function ($join) use ($lider_id) {
                $join->on("p.pessoa_id", '=', "tp.id");
                $join->on("lider_id", '=', DB::raw($lider_id));
            })
            ->select(DB::raw('count(p.atividade_id) as count_atividades, p.atividade_id'))
            ->groupBy("p.atividade_id")
            ->get();

        return $retorno;
    }
}
