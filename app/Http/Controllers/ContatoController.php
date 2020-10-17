<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Pessoa;
use App\Models\TipoContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contatos = Contato::all();
//        dd($contato);
        return view('contato.create', compact('contatos'));
    }

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
//        dd($contatos);
        if (count($contatos) != 0){
//            dd('não funcionou');
            return redirect()->back();
        }else{
//            dd('funcionou');
            if ($contato->save()){
                return redirect()->route('pessoa.create');
            }else{
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
//        dd($contato->$id);

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
//        dd($id);
        $id->contato = $request->contato;

        if($id->save()){
            return back();
        }else{
            return back();
        }
//        Contato::where(['id' => $id])->update([
//            $contato->tipos_contatos_id = $request->tipos_contatos_id,
//            $contato->contato = $request->contato,
//        ]);
//        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contato::query()->find($id)->delete();
        return back();
//        return redirect()->route('pessoa.create');
    }
}
