<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reunion;
use App\Asistente;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;
class ReunionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reuniones = Reunion::all();
        return view('miembros/reuniones')->with('reuniones',$reuniones);
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
        $Reunion = Reunion::create($request->all());
        return redirect()->action('reunionesController@index');
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
        $reunion = Reunion::find($id);
        $reunion->fecha=$request->input('EditarFecha');
        $reunion->hora=$request->input('EditarHora');
        $reunion->asunto=$request->input('EditarAsunto');

        $reunion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reunion = Reunion::find($id);
        $reunion->delete();
        return redirect()->action('reunionesController@index');
    }
    
    public function asistirReunion($id){
        $reunion = new Asistente;
        $reunion->id_Reunion = $id;
        $reunion->id_Usuario = Auth::user()->id;
        $reunion->save();
    }
    

    public function finalizar($id){
        $reunion = Reunion::find($id);
        $reunion->estado= "finalizada";
        $reunion->save();
        return redirect()->action('reunionesController@index');
    }
        public function enviarMail($id){
            Mail::to("acntaguilas@gmail.com")->send();
        }

}