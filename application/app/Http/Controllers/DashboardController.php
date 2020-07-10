<?php

namespace App\Http\Controllers;

use App\Models\PessoasAjudadas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $liderId = auth()->user()->id;

        $pessoasAjudadas = PessoasAjudadas::where('lider_id', $liderId)
            ->orderBy('tx_nome', 'ASC')
            ->get();

        return view('dashboard.listagem', compact('pessoasAjudadas'));
    }

    /**
     * Retorna json com lista de pessoas ajudadas de acordo com o Líder logado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarPessoasAjudadas()
    {
        $liderId = auth()->user()->id;

        $pessoasAjudadas = PessoasAjudadas::where('lider_id', $liderId)
            ->orderBy('tx_nome', 'ASC')
            ->get();

        return response()->json($pessoasAjudadas, 200);
    }
}
