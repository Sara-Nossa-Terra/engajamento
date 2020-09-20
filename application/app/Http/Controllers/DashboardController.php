<?php

namespace App\Http\Controllers;

use App\Models\Atividades;
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function listarPessoasAjudadas()
    {
        return PessoasAjudadasController::getByLiderId();
    }

    /**
     * Retorna json com lista de ativadades de acordo com o Líder logado.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|
     * Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\View\View
     *
     */
    public function listarAtividades(Request $request)
    {
        return AtividadesController::index($request);
    }
}
