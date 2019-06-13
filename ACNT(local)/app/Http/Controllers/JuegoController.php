<?php

namespace App\Http\Controllers;
use App\Juego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JuegoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $juegos = Juego::all();
        return view('usuarios/juegos')->with('juegos',$juegos);
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
    public function store(Request $request)
    {    
        
        $rules = array(
            'imagen' => 'required | mimes:jpeg,jpg,png | max:1024',
        );

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->fails()){
            if($request->hasFile('imagen')){
                $file=$request->file("imagen");
                $nombre = time();
                $file->move(public_path()."/img/imagenesJuegos/",$nombre);
            }
    
            $juego = new Juego();
            $juego->nombre = $request->input('nombre');
            $juego->plataforma = $request->input('plataforma');
            $juego->plataforma = $request->input('plataforma');
            $juego->imagen = $nombre;
            $juego->descripcion = $request->input('descripcion');
    
            $juego->save();
        }
           
        
      return redirect()->action('JuegoController@index');
        

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
        $juego = Juego::find($id);
        $rules = array(
            'imagen' => 'required | mimes:jpeg,jpg,png | max:1024',
        );

        $validator = Validator::make($request->all(), $rules);
        if(!$validator->fails()){
            if($request->hasFile('imagen')){
                $file=$request->file("imagen");
                $nombre = time();
                $file->move(public_path()."/img/imagenesJuegos/",$nombre);
                $juego->imagen = $nombre;
            }
        }

        $juego->plataforma= $request->input('plataforma');
        $juego->nombre= $request->input('nombre');
        $juego->descripcion= $request->input('descripcion');

        
        $juego->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $juego = Juego::find($id);
        $juego->delete();
        return redirect()->action('JuegoController@index');
    }
    
}
