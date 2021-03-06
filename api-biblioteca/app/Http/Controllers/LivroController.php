<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Genero;
use App\Models\Livro;
use App\Models\Editora;
use App\Http\Requests\LivroRequest;
use App\Traits\ApiResponser;

class LivroController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = array();
        foreach (Livro::all() as $livros) {
            $perso = array();

            $editora = Editora::where('id', $livros->id_editora)->first();
            $genero = Genero::where('id', $livros->id_genero)->first();
            $autor = Autor::where('id', $livros->id_autor)->first();

            $perso['id'] = $livros->id;
            $perso['titulo'] = $livros->titulo;
            $perso['ano'] = $livros->ano;
            $perso['editora'] = $editora->nome_editora;
            $perso['autor'] = $autor->nome;
            $perso['genero'] = $genero->descricao;

            $dados[] = $perso;
        }
        return json_encode($dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LivroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivroRequest $request)
    {
        $ret=Livro::create([
            'id_autor'=>$request->id_autor,
            'id_genero'=>$request->id_genero,
            'id_editora'=>$request->id_editora,
            'titulo'=>$request->titulo,
            'ano'=>$request->ano
        ]);

        if($ret){
            return $this->success($ret,''.$request->nome.' inserido com sucesso!');
        }else{
            return $this->error('Algum erro atrapalhou a inserção.', 422, $ret);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados=Livro::find($id);
        return json_encode($dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LivroRequest  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(LivroRequest $request, $id)
    {
        $ret = Livro::where(['id'=>$id])->update([
            'id_autor'=>$request->id_autor,
            'id_genero'=>$request->id_genero,
            'id_editora'=>$request->id_editora,
            'titulo'=>$request->titulo,
            'ano'=>$request->ano
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
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Livro::destroy($id);
        return $this->success(null,'Registro Nº '.$id.' excluído com sucesso!');
    }
}
