<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;

class SupervisorController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $id_torneo = $request->input('id_torneo');

        return view('miembros.tarea')->with('id_torneo',$id_torneo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {     
        $id_torneo = $_POST['id_torneo'];
        $id_usuario = $_POST['id_usuario'];
        $texto = $_POST['texto'];

        $supervisor = new Supervisor();
        $supervisor->tarea = $texto;
        $supervisor->id_Usuario = $id_usuario;
        $supervisor->id_Torneo = $id_torneo;
        $supervisor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
  
    }
    
}
