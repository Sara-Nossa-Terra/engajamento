<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lideres = User::orderBy('tx_nome', 'ASC')->paginate(5);
        return view('lideres.index', compact('lideres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('lideres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUpdateUserRequest $request
     */
    public function store(StoreUpdateUserRequest $request)
    {
        $lider = new User();
        $data = $request->toArray();
        $data['password'] = bcrypt($data['password']);
        $lider->fill($data);
        $lider->save();

        return redirect()->route('lideres.index')->withSuccess('Cadastro realizado com sucesso');
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
        if (!$lideres = User::findOrFail(base64_decode($id)) )
            return redirect()->back()->with('message', 'Não foi possível editar o registro !');

        return view('lideres.edit', compact('lideres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreUpdateUserRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserRequest $request, $id)
    {
        if (!$lider = User::findOrFail($id) )
            return redirect()->back()->with('message', 'Não foi possível atualizar o registro !');

        $data = $request->toArray();
        if (isset($request->password)) {
            $data['password'] = bcrypt($data['password']);
            unset($data['password_confirmation']);
        } else {
            unset($data['password_confirmation']);
            unset($data['password']);
        }

        $lider->fill($data);
        $lider->save();

        return redirect()
            ->route('lideres.index')
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
        if (!$lideres = User::where('id', base64_decode($id))->first() )
            return redirect()->back()->with('message', 'Não foi possível excluír o registro !');

        $lideres->delete();

        return redirect()->route('lideres.index')->withSuccess('Cadastro excluído com sucesso !');
    }
}
