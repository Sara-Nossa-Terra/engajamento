<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PessoasAjudadasController extends EngajamentoController
{
    public function destroy($id)
    {
        try {
            $this->model = $this->model->find(base64_decode($id));
            $this->model->deleted_id = auth()->user()->id;
            $this->model->save();
            $this->model->delete();
            return redirect()->route("{$this->redirectDelete}.index")->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            Log::info($e);
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }
}
