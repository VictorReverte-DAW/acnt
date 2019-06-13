<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
class ajaxCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $usuario = User::find($id);

        $usuario->nick= $request->input('nick');
        $usuario->name= $request->input('name');
        $usuario->apellido= $request->input('apellido');
        $usuario->email= $request->input('email');
        $usuario->password= $request->input('password');
        $usuario->provincia= $request->input('provincia');
        $usuario->localidad= $request->input('localidad');
        $usuario->cp= $request->input('cp');
        $usuario->telefono= $request->input('telefono');
        $usuario->fnac= $request->input('fnac');
        $usuario->esMiembro= $request->input('esMiembro');
        if($usuario->esMiembro==="0"){
            $usuario->id_rol=6;
        }else{
            $usuario->id_rol= $request->rol;
        }

        
        $usuario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
