<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAtividadePessoaFormRequest;
use App\Models\AtividadePessoa;

class AtividadePessoaController extends Controller
{
    public function store(StoreUpdateAtividadePessoaFormRequest $request)
    {
        $atividades = new AtividadePessoa();
        $atividades->fill($request->toArray());
        $atividades->save();

        return response()->json($atividades, 201);
    }

    public function destroy($id)
    {
        $atividade = AtividadePessoa::where('id', $id)->first();
        if(!$atividade){
            return response()->json(['message', 'Não foi possível excluír o registro !'], 404);
        }
        $atividade->delete();

        return response()->json(['message' => 'Cadastro excluído com sucesso !'], 200);
    }
}
