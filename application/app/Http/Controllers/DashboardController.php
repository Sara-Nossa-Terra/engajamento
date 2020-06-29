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
}
