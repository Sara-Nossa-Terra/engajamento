<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePessoasAjudadasFormRequest;
use App\Models\{User, PessoasAjudadas};
use Illuminate\Http\Request;

class PessoasAjudadasController
{
    protected $repository;

    public function __construct()
    {
//        $this->repository = PessoasAjudadas;
    }

    public function index()
    {
        $pessoasAjudadas = PessoasAjudadas::orderBy('tx_nome', 'ASC')->paginate(5);
        return view('pessoasajudadas.index', compact('pessoasAjudadas'));
    }

    public function create()
    {
        $userLoggedIn = array(auth()->user()->id);
//        $lideres = User::whereNotIn('id', $userLoggedIn)->get();
        $lideres = User::all();
        return view('pessoasajudadas.create', compact('lideres'));
    }

    public function store(StoreUpdatePessoasAjudadasFormRequest $request)
    {
        $pessoasAjudadas = new PessoasAjudadas();
        $pessoasAjudadas->fill($request->toArray());
        $pessoasAjudadas->save();

        return redirect()->route('pessoasajudadas.index')->withSuccess('Cadastro realizado com sucesso');
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
        if (!$pessoasAjudadas = PessoasAjudadas::where('id', base64_decode($id))->first() )
            return redirect()->back();

        $lideres = \App\Models\User::all();

        return view('pessoasajudadas.create', compact(['pessoasAjudadas', 'lideres']));
    }

    public function update(StoreUpdatePessoasAjudadasFormRequest $request, $id)
    {
        dd($request);
        $this->repository
            ->update($id, [
                'title'         => $request->title,
                'description'   => $request->description,
            ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        if (!$pessoasAjudadas = PessoasAjudadas::where('id', base64_decode($id))->first() )
            return redirect()->back()->with('message', 'Não foi possível excluír o registro !');

        $pessoasAjudadas->delete();

        return redirect()->route('pessoasajudadas.index')->withSuccess('Cadastro excluído com sucesso !');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $categories = $this->repository->search($data);

        return view('admin.categories.index', compact('categories', 'data'));
    }
}
