<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Http\Requests\GeneroRequest;
use App\Traits\ApiResponser;

class GeneroController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados=Genero::all();
        return json_encode($dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GeneroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request)
    {
        $ret=Genero::create([
            'descricao'=>$request->descricao
        ]);

        if($ret){
            return $this->success($ret,' '.$request->descricao.' inserido com sucesso!');
        }else{
            return $this->error('Algum erro atrapalhou a inserção.', 422, $ret);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados=Genero::find($id);
        return json_encode($dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GeneroRequest  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(GeneroRequest $request, $id)
    {
        $ret = Genero::where(['id'=>$id])->update([
            'descricao'=>$request->descricao
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
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genero::destroy($id);
        return $this->success(null,'Registro Nº '.$id.' excluído com sucesso!');
    }
}
