<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Http\Requests;

class GruposController extends Controller
{
    //
    public function index()
    {
        //Se manda a llamar todas las grupos que existen en la tabla 'grupos' mediante el modelo grupo
        $grupos = Grupo::all();
        //Se manda a llamar la vista index y le pasamos la lista de usuarios que obtuvimos mediante el modelo grupo
        return view('grupos.index')->with('grupos',$grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se crea un objeto vacio del modelo grupo
        $grupo= new Grupo;
        //Se manda a llamar la vista create y le pasamos el objeto vacio que creamos con el modelo grupo
        return view('grupos.create')->with('grupo',$grupo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creamos un prodcuto nuevo con el modelo grupo y lo rellenamos con los datos que ingresa el usuario
        $grupo = new Grupo($request->all());
        //Mandamos a guaradar la nueva grupo creada
        $grupo->save();
        //Redireccionamos al index
        return redirect()->route('grupos.index');
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
        //Buscamos la grupo que queremos modificar con el modelo grupo y con el parametro ID que rescibimos
        $grupo = Grupo::find($id);
        //Mandamos a llamar la vista edit y le mandamos la grupo que extragimos de la base mediante el model grupo
        return view('grupos.edit')->with('grupo',$grupo);
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
        //Buscamos la grupo que vamos a asignar los nuevos valores con el modelo grupo y find
        $grupos= Grupo::find($id);
        //Vaciamos los atributos modificados con fill al registro ya existente
        $grupo->fill($request->all());
        //Guardamos la grupo con los campos ya modificados
        $grupo->save();
        //Redireccionamos al index
        return redirect()->route('grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Buscamos y eliminaos la grupo que seleccionamos
        Grupo::destroy($id);
        //Redireccionamos al index
        return redirect()->route('grupos.index');
    }
}
