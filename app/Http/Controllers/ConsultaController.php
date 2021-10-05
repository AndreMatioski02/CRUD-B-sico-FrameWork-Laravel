<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;
use App\Paciente;
use App\Medico;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtendo todos os pacientes
        $pacientes = Paciente::pluck('nome','id');
        //obtendo todos os medicos
        $medicos = Medico::pluck('nome','id');
        
        return view ('consultas.create', compact('pacientes','medicos'));
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
            'paciente_id'       =>      'required|max:35',
            'medico_id'         =>      'required|max:35',
            'data'              =>      'required|max:35',
            'hora'              =>      'required|max:35'
        ]);

        $consulta = Consulta::create($validateData);
        return redirect('/consultas')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::findOrFail($id);

        return view('consultas.show',compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Obtendo os dados dos pacinetes
        $pacientes = Pacientes::pluck('nome','id');
        //Obtendo os dados do médico
        $medico = Medico::pluck('nome','id');
        //criando um objeto para receber o resultado da busca de registro/objeto específico
        $consulta = Consulta::findOrFail($id);

        return view('consultas.edit', compact('consulta','pacientes','medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'paciente_id'       =>      'required|max:35',
            'medico_id'         =>      'required|max:35',
            'data'              =>      'required|max:35',
            'hora'              =>      'required|max:35'
        ]);

        Consultas::whereId($id)->update($validateData);
        
        return redirect('/consultas')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        
        $consulta->delete();
        
        return redirect('/consultas')->with('success', 'Dados removidos com sucesso!');
    }
}
