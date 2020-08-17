<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAtividadesFormRequest;
use App\Models\Atividades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtividadesController extends Controller
{
    protected $repository;

    public function __construct()
    {
//        $this->repository = PessoasAjudadas;
    }

    public function index(Request $request)
    {
        if ( !$request->ajax() )
            return view('atividades.index');

        $atividades = Atividades::orderBy('tx_nome', 'ASC')->get()->toArray();

        $atividades = array_map(function ($atividades) {
            $atividades['dt_dia'] = (new \DateTime($atividades['dt_dia']))->format('d/m/Y  H:i');

            return $atividades;
        }, $atividades);

        return response()->json($atividades, 200);
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
        $category = $this->repository->findById($id);

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

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $categories = $this->repository->search($data);

        return view('admin.categories.index', compact('categories', 'data'));
    }

    /**
     * Retorna lista de Atividades de acordo pela data filtrada.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAtividadesPorFiltro(Request $request)
    {
        $data = $this->getData($request->all());

        $atividades = Atividades::where(function ($query) use ($data) {
            $query->where(DB::raw("TO_CHAR(dt_dia, 'YYYY-MM-DD')"), $data);
        })->get();

        return response()->json($atividades, 200);
    }

    /**
     * Verifica filtros passados via parametro e retorna data para ser filtrada.
     *
     * @param array $params
     * @return string
     */
    private function getData(array $params): string
    {
        if (
            !array_key_exists('year', $params) ||
            !array_key_exists('month', $params) ||
            !array_key_exists('day', $params)
        ) {
            return date("Y-m-d");
        }

        $date = "{$params['year']}-{$params['month']}-{$params['day']}";

        return $date;
    }
}
