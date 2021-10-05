<?php

namespace App\Http\Controllers;

use App\TipoExame;
use Illuminate\Http\Request;

class TipoExameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoExames = TipoExame::all();
        return view('tipoExames.index', compact('tipoExames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tipoExames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nome_tpex'        =>      'required',
            'sigla_tpex'       =>      'required',
            'desc_tpex'        =>      'required'
            
        ]);

        $tipoExame = TipoExame::create($validateData);
        return redirect('/tipoExames')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoExame = TipoExame::findOrFail($id);
        // retornando a tela de visualização com o
        // objeto recuperado
        return view('tipoExames.show',compact('tipoExame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoExame = TipoExame::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('tipoExames.edit', compact('tipoExame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nome_tpex'        =>      'required',
            'sigla_tpex'       =>      'required',
            'desc_tpex'        =>      'required'
            
        ]);

        TipoExame::whereId($id)->update($validateData);
        
        return redirect('/tipoExames')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoExame = TipoExame::findOrFail($id);
        
        $tipoExame->delete();

        return redirect('/tipoExames')->with('success', 
        'Dados removidos com sucesso!');
    }
}
