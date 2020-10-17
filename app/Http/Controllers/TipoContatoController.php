<?php

namespace App\Http\Controllers;

use App\Models\TipoContato;
use Illuminate\Http\Request;

class TipoContatoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposcontatos = TipoContato::all();

        return view('tiposContatos.create', compact('tiposcontatos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TipoContato $tipoContato)
    {
        $tipoContato->descricao = $request->descricao;
//        $tipoContato->save();
        if ($tipoContato->save()){
            flash('Tipo de Contato Adicionado com Sucesso!')->success();
            return redirect()->route('tipocontato.create');
        }else{
            return redirect()->back();
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
        if(TipoContato::query()->find($id)->delete()){
            flash('Tipo de Contato Excluido com Sucesso!')->success();
            return redirect()->route('tipocontato.create');
        }else{
            flash('Opss, Tipo de Contato não Excluido! Tente novamente mais Tarde')->error();
            return redirect()->route('tipocontato.create');
        }
    }
}
