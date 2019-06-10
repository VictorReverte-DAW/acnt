<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Torneo;
use App\Participante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos = Torneo::all();
        return view('usuarios/torneos')->with('torneos',$torneos);
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
        $rules = array(
            'ImagenTorneo' => 'required | mimes:jpeg,jpg,png | max:1024',
        );

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->fails()){
        if($request->hasFile('ImagenTorneo')){
            $file=$request->file("ImagenTorneo");
            $nombre = time();
            $file->move(public_path()."/img/imagenesTorneos/",$nombre);
        }

        $torneo = new Torneo;

        $torneo->nombre=$request->input('nombre');
        $torneo->gratis=$request->input('gratis');
        $torneo->max_jugadores=$request->input('max_jugadores');
        $torneo->fecha=$request->input('fecha');
        $torneo->hora=$request->input('hora');
        $torneo->estado=$request->input('estado');
        $torneo->id_juego=$request->input('id_juego');
        $torneo->precio =$request->input('precio');
        $torneo->imagen = $nombre;

        $torneo->save();
    
        return redirect()->action('TorneoController@index');
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
        $torneo = Torneo::find($id);
        $rules = array(
            'imagen' => 'required | mimes:jpeg,jpg,png | max:1024',
        );

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->fails()){
            if($request->hasFile('imagen')){
                $file=$request->file("imagen");
                $nombre = time();
                $file->move(public_path()."/img/imagenesTorneos/",$nombre);
                $torneo->imagen = $nombre;
            }
        }

        $torneo->gratis= $request->input('gratis');
        $torneo->nombre= $request->input('nombre');
        $torneo->precio= $request->input('precio');

        
        $torneo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $torneo = Torneo::find($id);
        $torneo->delete();
        return redirect()->action('TorneoController@index');
    }
    public function inscribirse($id){
        $torneo = new Participante;
        $torneo->id_Torneo = $id;
        $torneo->id_Usuario = Auth::user()->id;
        $torneo->save();
    }   
    public function describirse($id){
        $torneo = Participante::find($id);
        $torneo->delete();
    }
    public function finalizar($id){
        $torneo = Torneo::find($id);
        $torneo->estado= "finalizada";
        $torneo->save();
        return redirect()->action('TorneoController@index');
    }
    
}
