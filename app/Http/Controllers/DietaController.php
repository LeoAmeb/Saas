<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DietaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos['dietas_table'] = Alimento::where([['activo','1']])->orderBy('id','DESC')->get();
        return view('dieta.index')->with($datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
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
            $dieta = new Dieta();
            $dieta->nombre = $request->nombre;
            $dieta->total_calorias = $request->total_calorias;
            $dieta->fecha = $request->fecha;
            $dieta->save();
            return response()->json(['success'=>'Se ha Agegado con Exito']);            
        }catch (Exception $e) {
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
    public function update(Request $request, $id){
        try {
            $dieta = Dieta::find($id);
            $dieta->fill($request->all());
            $dieta->save();
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
        $dieta = Dieta::find($id);
        $dieta->activo = 0;
        $dieta->save();
        return redirect()->route('dieta.index');
    }
}