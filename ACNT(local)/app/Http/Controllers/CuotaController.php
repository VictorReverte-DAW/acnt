<?php

namespace App\Http\Controllers;
use App\cuota;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cuota = Cuota::all();
        return view('usuarios/cuota')->with('cuota',$juegos);
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
    public function store(){
        $usuario = DB::table('cuotas')->where('id_Usuario',"=",$_POST['id'])->first();
        $id = $_POST['id'];
        $total = $_POST['total']; 
        $fecha = date("Y/m/d", strtotime($_POST['fecha']));
        if(is_null($usuario)){
            $cuota = new Cuota();
            $cuota->fecha_pago=$fecha;
            $cuota->total= $total;
            $cuota->id_Usuario=$id;
            $cuota->save();
        }else{
            $cuota = Cuota::find($id);
            $cuota->fecha_pago = $fecha;
            $cuota->total += $total;
            $cuota->id_Usuario = $id;
            $cuota->save();
        }
        
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

    public function pagar($id)
    {
      
        $total = $_POST['total'];
        $fecha = date("m-d-Y", "2019/06/08");
        
    }
}
