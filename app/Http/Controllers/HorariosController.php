<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\Http\Requests;

class HorariosController extends Controller
{
     public function index()
    {
        //Se manda a llamar todas las horarios que existen en la tabla 'horarios' mediante el modelo horario
        $horarios = Horario::all();
        //Se manda a llamar la vista index y le pasamos la lista de usuarios que obtuvimos mediante el modelo horario
        return view('horarios.index')->with('horarios',$horarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se crea un objeto vacio del modelo horario
        $horario= new Horario;
        //Se manda a llamar la vista create y le pasamos el objeto vacio que creamos con el modelo horario
        return view('horarios.create')->with('horario',$horario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creamos un prodcuto nuevo con el modelo horario y lo rellenamos con los datos que ingresa el usuario
        $horario = new Horario($request->all());
        //Mandamos a guaradar la nueva horario creada
        $horario->save();
        //Redireccionamos al index
        return redirect()->route('horarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos la horario que queremos modificar con el modelo horario y con el parametro ID que rescibimos
        $horario = Horario::find($id);
        //Mandamos a llamar la vista edit y le mandamos la horario que extragimos de la base mediante el model horario
        return view('horarios.edit')->with('horario',$horario);
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
        //Buscamos la horario que vamos a asignar los nuevos valores con el modelo horario y find
        $horarios= Horario::find($id);
        //Vaciamos los atributos modificados con fill al registro ya existente
        $horario->fill($request->all());
        //Guardamos la horario con los campos ya modificados
        $horario->save();
        //Redireccionamos al index
        return redirect()->route('horarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Buscamos y eliminaos la horario que seleccionamos
        Horario::destroy($id);
        //Redireccionamos al index
        return redirect()->route('horarios.index');
    }
}
