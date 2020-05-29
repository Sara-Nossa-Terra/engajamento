<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePessoasAjudadasFormRequest;
use App\Models\{User, PessoasAjudadas};
use Illuminate\Http\Request;

class PessoasAjudadasController
{
    public function index()
    {
        $pessoasAjudadas = PessoasAjudadas::orderBy('title', 'ASC')->paginate(5);
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
        dd($request);
        return redirect()
            ->route('categories.index')
            ->withSuccess('Cadastro realizado com sucesso');
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
        if (!$category = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.categories.edit', compact('category'));
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
        dd($id);
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $categories = $this->repository->search($data);

        return view('admin.categories.index', compact('categories', 'data'));
    }
}
