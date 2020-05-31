<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUpdateRevisaoFormRequest;
use App\Models\Revisao;

class RevisaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revisoes = Revisao::orderBy('created_at', 'ASC')->paginate(5);
        return view('revisao.index', compact('revisoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('revisao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUpdateRevisaoFormRequest $request
     */
    public function store(StoreUpdateRevisaoFormRequest $request)
    {
        $revisao = new Revisao();
        $data = $request->toArray();
        $revisao->fill($data);
        $revisao->save();

        return redirect()->route('revisao.index')->withSuccess('Cadastro realizado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (!$revisao = Revisao::findOrFail(base64_decode($id)) )
            return redirect()->back()->with('message', 'Não foi possível editar o registro !');

        return view('revisao.edit', compact('revisao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreUpdateRevisaoFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRevisaoFormRequest $request, $id)
    {
        if (!$revisao = Revisao::findOrFail($id) )
            return redirect()->back()->with('message', 'Não foi possível atualizar o registro !');

        $data = $request->toArray();
        $revisao->fill($data);
        $revisao->save();

        return redirect()
            ->route('revisao.index')
            ->withSuccess('Cadastro atualizado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$revisao = Revisao::where('id', base64_decode($id))->first() )
            return redirect()->back()->with('message', 'Não foi possível excluír o registro !');

        $revisao->delete();

        return redirect()->route('revisao.index')->withSuccess('Cadastro excluído com sucesso !');
    }
}
