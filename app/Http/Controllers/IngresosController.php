<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Ingresos;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos['ingresos_table'] = Ingresos::orderBy("created_at","DESC")->get();
        return view('ingresos.index')->with($datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['clientes'] = Clientes::where('activo','1')->get();
        return view('ingresos.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        try {
            $ingreso = new Ingresos();
            $ingreso->monto = $request->monto;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->id_cliente=$request->id_cliente;
            $ingreso->save();
            return response()->json(['success'=>'Se ha Agegado con Exito']);
        } catch (Exception $e) {
            dd($e->getMessage());
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
        $datos['ingresos'] = Ingresos::find($id);
        return view('ingresos.create')->with($datos);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        try{
            $ingreso = Ingresos::find($id);
            $ingreso->fill($request->all());
            $ingreso->save();
            return response()->json(['success'=>'Se ha Editado con Exito']);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso = Ingresos::find($id);
        $ingreso->delete();
        return redirect()->route('ingresos.index');
    }
}
