<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAtividadesFormRequest;
use App\Models\Atividades;
use Illuminate\Http\Request;

class AtividadesController extends Controller
{
    protected $repository;

    public function __construct()
    {
//        $this->repository = PessoasAjudadas;
    }

    public function index()
    {
        $atividades = Atividades::orderBy('tx_nome', 'ASC')->paginate(5);
        return view('atividades.index', compact('atividades'));
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
        if (!$atividades = Atividades::findOrFail(base64_decode($id)) )
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
        if (!$atividades = Atividades::where('id', base64_decode($id))->first() )
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
}
