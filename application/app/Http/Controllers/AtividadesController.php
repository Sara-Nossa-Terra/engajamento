<?php

namespace App\Http\Controllers;

use App\Models\{PessoasAjudadas, Atividades, User};
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
        $lider_id = auth()->user()->id;

        $pessoas = PessoasAjudadas::where('lider_id', $lider_id)->get()->toArray();
        $lider = User::find($lider_id)->first()->toArray();

        $retorno = array();

        foreach ((array)$pessoas as $pessoa) {
            $retorno['pessoasAjudadas'][$pessoa['id']] = $pessoa;

            # filtra as Atividades verificando se foi realizada a "chamada";
            $atividades = Atividades::leftJoin("tb_atividades_pessoas as tap", function ($join) use ($pessoa) {
                $join->on("tap.atividade_id", "=", "tb_atividades.id");
                $join->on("tap.pessoa_id", "=", DB::raw($pessoa['id']) );
            })
                ->leftJoin("tb_pessoas as tp", function ($join) use ($request, $lider_id) {
                    $join->on("tap.pessoa_id", "=", "tp.id");
                    $join->on("tp.lider_id", "=", DB::raw($lider_id));
                $join->whereBetween('dt_dia', [$request['dt_begin'], $request['dt_until']]);
                })
                ->select("tap.id as thumbsup", "tb_atividades.*")
                ->where("tap.deleted_at", "=", null)
                ->get();

            foreach($atividades as $atividade) {

                # Conversão para bolleano do thumbsUp.
                $atividade['thumbsup'] = !!$atividade['thumbsup'];

                $retorno['pessoasAjudadas'][$pessoa['id']]['atividade'][] = $atividade;
            }
        }
        $retorno['atividades'] = Atividades::whereBetween('dt_dia', [$request['dt_begin'], $request['dt_until']])->get();
//        $retorno['atividades'][] = Atividades::all();
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
