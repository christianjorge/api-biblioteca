<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use App\Http\Requests\EditoraRequest;
use App\Traits\ApiResponser;

class EditoraController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados=Editora::all();
        return json_encode($dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EditoraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditoraRequest $request)
    {
        $ret=Editora::create([
            'nome_editora'=>$request->nome_editora
        ]);

        if($ret){
            return $this->success($ret,' '.$request->nome_editora.' inserido com sucesso!');
        }else{
            return $this->error('Algum erro atrapalhou a inserção.', 422, $ret);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados=Editora::find($id);
        return json_encode($dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditoraRequest  $request
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function update(EditoraRequest $request,$id)
    {
        $ret = Editora::where(['id'=>$id])->update([
            'nome_editora'=>$request->nome_editora
        ]);

        if($ret){
            return $this->success(null,'Registro Nº '.$id.' alterado com sucesso!');
        }else{
            return $this->error('Algum erro atrapalhou a atualização dos Dados', 422, $ret);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Editora::destroy($id);
        return $this->success(null,'Registro Nº '.$id.' excluído com sucesso!');
    }
}
