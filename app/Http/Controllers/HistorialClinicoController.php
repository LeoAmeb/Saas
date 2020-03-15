<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistorialClinicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos['clientes_table'] = Clientes::where([['activo','1']])->orderBy('id','DESC')->get();

        return view('clientes.index')->with($datos);
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
        try {
            $historial = new Historial_Clinico();
            $historial->fecha = $request->fecha;
            $historial->motivo_consulta = $request->motivo_consulta; 
            $historial->terapia_previa = $request->terapia_previa;
            $historial->cirujias_realizadas = $request->cirujias_realizadas; 
            $historial->alergias = $request->alergias;
            $historial->save();
            return response()->json(['success'=>'Se ha Agegado con Exito']);    
        }catch (Exception $e){
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
        try {
            $clientes = Historial_Clinico::find($id);
            $clientes->fill($request->all());
            $clientes->save();
            return response()->json(['success'=>'Se ha Editado con Exito']);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $alimento = Alimento::find($id);
        $alimento->activo = 0;
        $alimento->save();
        return redirect()->route('clientes.index');
    }
}
