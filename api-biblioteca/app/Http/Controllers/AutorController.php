<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\AutorRequest;
use App\Traits\ApiResponser;

class AutorController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados=Autor::all();
        return json_encode($dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AutorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutorRequest $request)
    {
        $ret=Autor::create([
            'nome'=>$request->nome,
            'ano_nasc'=>$request->ano_nasc,
            'sexo'=>$request->sexo,
            'nacionalidade'=>$request->nacionalidade
        ]);

        if($ret){
            return $this->success($ret,'Autor '.$request->nome.' inserido com sucesso!');
        }else{
            return $this->error('Algum erro atrapalhou a inserção do autor', 422, $ret);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados=Autor::find($id);
        return json_encode($dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAutorRequest  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(AutorRequest $request, $id)
    {
        $ret = Autor::where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'ano_nasc'=>$request->ano_nasc,
            'sexo'=>$request->sexo,
            'nacionalidade'=>$request->nacionalidade
        ]);

        if($ret){
            return $this->success($ret,'Autor Nº '.$id.' alterado com sucesso!');
        }else{
            return $this->error('Algum erro atrapalhou a atualização dos Dados', 422, $ret);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Autor::destroy($id);
        return $this->success(null,'Autor Nº '.$id.' excluído com sucesso!');
    }
}
