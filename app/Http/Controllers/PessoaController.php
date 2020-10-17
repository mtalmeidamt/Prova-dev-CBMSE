<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\TipoContato;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::all();
        $tiposContatos = TipoContato::all();

        return view('pessoa.create', compact('pessoas', 'tiposContatos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pessoa $pessoa)
    {
        $pessoa->nome = $request->nome;
        $pessoa->sobrenome = $request->sobrenome;
        $pessoa->save();

        if ($pessoa->save()){
            flash('Pessoa Adicionada com Sucesso!')->success();
            return redirect()->route('pessoa.create');
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
        Pessoa::query()->find($id)->delete();
        return redirect()->route('pessoa.create');
    }
}
