<?php

namespace App\Http\Controllers;

use App\Convenio;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convenios = Convenio::all();
        return view('convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('convenios.create');
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
            'nome_conv'         =>      'required',
            'fone_cov'          =>      'required',
            'site_conv'         =>      'required',
            'contato_conv'      =>      'required',
            'perccons_conv'     =>      'required',
            'percexame_conv'    =>      'required'
            
        ]);
        $convenio = Convenio::create($validateData);
        return redirect('/convenios')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convenio = Convenio::findOrFail($id);
        // retornando a tela de visualização com o
        // objeto recuperado
        return view('convenios.show',compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convenio = Convenio::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('convenios.edit', compact('convenio'));
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
            'nome_conv'         =>      'required',
            'fone_cov'          =>      'required',
            'site_conv'         =>      'required',
            'contato_conv'      =>      'required',
            'perccons_conv'     =>      'required',
            'percexame_conv'    =>      'required'
            
        ]);

        Convenio::whereId($id)->update($validateData);
        
        return redirect('/convenios')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $convenio = Convenio::findOrFail($id);
        
        $convenio->delete();

        return redirect('/convenios')->with('success', 'Dados removidos com sucesso!');
    }
}
