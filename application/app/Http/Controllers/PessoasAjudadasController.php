<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePessoasAjudadasFormRequest;
use App\Http\Resources\PessoasAjudadasResource;
use App\Models\{User, PessoasAjudadas};
use Illuminate\Http\Request;

class PessoasAjudadasController extends Controller
{
    public function index()
    {
        $pessoasAjudadas = PessoasAjudadas::orderBy('tx_nome', 'ASC')->paginate(30);
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
        if (!$pessoasAjudadas = PessoasAjudadas::findOrFail($id))
            return redirect()->back()->with('message', 'Não foi possível editar o registro !');

        $lideres = \App\Models\User::all();

        return view('pessoasajudadas.edit', compact(['pessoasAjudadas', 'lideres']));
    }

    public function update(StoreUpdatePessoasAjudadasFormRequest $request, $id)
    {
        if (!$pessoasAjudadas = PessoasAjudadas::findOrFail($id))
            return redirect()->back()->with('message', 'Não foi possível atualizar o registro !');

        $pessoasAjudadas->fill($request->toArray());
        $pessoasAjudadas->save();

        return redirect()
            ->route('pessoasajudadas.index')
            ->withSuccess('Cadastro atualizado com sucesso !');
    }

    public function destroy($id)
    {
        if (!$pessoasAjudadas = PessoasAjudadas::where('id', $id)->first())
            return redirect()->back()->with('message', 'Não foi possível excluír o registro !');

        $pessoasAjudadas->delete();

        return redirect()->route('pessoasajudadas.index')->withSuccess('Cadastro excluído com sucesso !');
    }

    public static function getByLiderId()
    {
        $liderId = auth()->user()->id;

        $pessoasAjudadas = PessoasAjudadas::where('lider_id', $liderId)
            ->orderBy('tx_nome', 'ASC')
            ->get();

        return PessoasAjudadasResource::collection($pessoasAjudadas);
    }
}
