<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Alimento;

class AlimentoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos['alimentos_table'] = Alimento::orderBy('id','DESC')->get();
        return view('alimento.index')->with($datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('alimento.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        try {

            $alimento = new Alimento();
            $alimento->nombre = $request->nombre;
            $alimento->agua = $request->agua;
            $alimento->azucar=$request->azucar;            
            $alimento->hdec=$request->hdec;
            $alimento->lipidos = $request->lipidos;
            $alimento->proteina = $request->proteina;
            $alimento->fibra = $request->fibra;
            $alimento->calcio = $request->calcio;
            $alimento->hierro = $request->hierro;
            $alimento->magnesio = $request->magnesio;
            $alimento->fosforo = $request->fosforo;
            $alimento->potasio = $request->potasio;
            $alimento->sodio = $request->sodio;
            $alimento->cobre = $request->cobre;
            $alimento->save();
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
        $datos['alimento'] = Alimento::find($id);
        return view('alimento.create')->with($datos);   
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
            $alimento = Alimento::find($id);
            $alimento->fill($request->all());
            $alimento->save();
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
    public function destroy($id){
        $alimento = Alimento::find($id);
        $alimento->delete();
        return redirect()->route('alimento.index');
    }
}
