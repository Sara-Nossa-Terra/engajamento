<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Classes\Util;

class EngajamentoController extends Controller
{
    protected $model;
    protected $modelName;
    protected $dirView;
    protected $redirectSave;
    protected $redirectDelete;

    /**
     * EngajamentoController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $classe = substr(get_class($this), strrpos(get_class($this), '\\') + 1);
        if (!$this->modelName) {
            $this->modelName = 'App\\Models\\' . str_replace('Controller', '', $classe);
        }

        $entidade = strtolower(str_replace('Controller', '', $classe));

        if (!$this->dirView) {
            $this->dirView = $entidade;
        }

        if (!$this->redirectSave) {
            $this->redirectSave = $entidade;
        }

        if (!$this->redirectDelete) {
            $this->redirectDelete = $entidade;
        }

        if (!is_object($this->model)) {
            $this->model = new $this->modelName();
        }
    }

    /**
     * Retorna a view com o array de itens ordenado pelo primeiro item do $fillable.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $orderBy = $this->model->getFillable()[0];
            $aItens = $this->model->orderBy("{$orderBy}", "asc")->get();

            return view("{$this->dirView}.index", compact('aItens'));
        } catch (\Exception $e) {
            Log::info($e);
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }

    /**
     * Exibe o fomulário para criação de um novo registro.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $aDados = $this->recuperarDados();

        $aDados['model'] = $this->model;
        return view("{$this->dirView}.formulario", $aDados);
    }

    /**
     * Método para salvar/alterar um registro.
     *
     * @param Request $request Dados vindo do formulário.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            if ($id = base64_decode($request->id)) {
                $this->model = $this->model->find($id);
            }
            $this->model->fill($request->toArray());
            $this->model->save();
            return redirect()->route("{$this->redirectSave}.index")->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            Log::info($e);
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }

    /**
     * Exibe o formulário com dados específicos para edição.
     *
     * @param int $id Id do registro.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aDados = $this->recuperarDados();
        $aDados['model'] = $this->model->find(base64_decode($id));

        return view("{$this->dirView}.formulario", $aDados);
    }

    /**
     * Remove um dado específico através do id.
     *
     * @param int $id Id do registro que será excluído.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->model = $this->model->find(base64_decode($id));
            $this->model->delete();
            return redirect()->route("{$this->redirectDelete}.index")->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            Log::info($e);
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }

    protected function _recuperarDados()
    {
        return [];
    }
}
