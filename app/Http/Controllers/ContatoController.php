<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Pessoa;
use App\Models\TipoContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contato $contato)
    {
        $contato->pessoa_id = $request->id_pessoa;
        $contato->tipos_contatos_id = $request->tipos_contatos_id;
        $contato->contato = $request->contato;

        $contatos = Contato::all()->where('contato', '=', $request->contato);
        if (count($contatos) != 0){
            flash('Contato já com Existe!')->error();
            return redirect()->back();
        }else{
            if ($contato->save()){
                flash('Contato Salvo com Sucesso!')->success();
                return redirect()->route('pessoa.create');
            }else{
                flash('Contato não foi salvo!')->error();
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoas = Pessoa::find($id);

        $tiposContatos = TipoContato::all();

        return view('contato.show', [
            'contatos' => $pessoas->contato,
            'pessoa' => $pessoas,
            'tiposContatos' => $tiposContatos
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $id)
    {
        $id->contato = $request->contato;

        if($id->save()){
            flash('Contato Editado com Sucesso!')->success();
            return back();
        }else{
            flash('Contato não editado!')->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Contato::query()->find($id)->delete()){
            flash('Contato Excluido com Sucesso!')->success();
            return back();
        }else{
            flash('Contato não excluido!')->error();
            return back();
        }



    }
}
