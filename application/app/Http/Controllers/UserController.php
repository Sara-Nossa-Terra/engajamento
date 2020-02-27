<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends EngajamentoController
{
    protected $dirView = 'lideres';
    protected $redirectSave = 'lideres';
    protected $redirectDelete = 'lideres';

    public function store(Request $request)
    {
        try {
            $data = $request->toArray();

            if ($id = base64_decode($request->id)) {
                $this->model = $this->model->find($id);
            }

            $data['password'] = $this->verificarSenha($data, $this->model);

            $this->model->fill($data);
            $this->model->save();
            return redirect()->route("{$this->redirectSave}.index")->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            Log::info($e);
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }

    protected function recuperarDados()
    {
        $aDados['lideres'] = $this->model->orderBy("{$this->orderBy}", "asc")->get();

        return $aDados;
    }

    protected function verificarSenha(array $data, $user)
    {
        if (isset($data['password'])) {
            if ($data['password'] !== $data['password_confirmation']) {
                return back()->with('error', 'As Senhas não conferem, favor digitar novamente!');
            } else {
                return $data['password'] = bcrypt($data['password']);
            }
        } else {
            return $data['password'] = $user->password;
        }
    }
}
