<?php

namespace App\Http\Controllers;
use App\Participante;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ParticipantesController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

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
        $id = $_POST['id_torneo'];
        $comentario = $_POST['comentario'];
        $puntacion = $_POST['puntuacion'];

        $participante = new Participante();
        $participante->comentario = $comentario;
        $participante->id_Usuario = Auth::user()->id;
        $participante->puntuacion = $puntacion;
        $participante->id_Torneo = $id;
        $participante->save();

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
