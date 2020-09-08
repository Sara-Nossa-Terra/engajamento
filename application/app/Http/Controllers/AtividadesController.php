<?php

namespace App\Http\Controllers;

use App\Http\Requests\{GetAtividadeFormRequest, StoreUpdateAtividadesFormRequest};
use App\Http\Resources\AtividadesResource;
use App\Models\Atividades;
use Illuminate\Http\Request;

class AtividadesController extends Controller
{
    public static function index(Request $request)
    {
        if ( !$request->ajax() )
            return view('atividades.index');

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
        $atividades = Atividades::whereBetween('dt_dia', [$request['dt_begin'], $request['dt_until']])->get();

        return AtividadesResource::collection($atividades);
    }
}
