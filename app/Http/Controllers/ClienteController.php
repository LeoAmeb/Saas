<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Clientes; 
use App\User; 
use Mail;
use Session;
use App\Mail\SendEmail;


class ClienteController extends Controller
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
        

        return view('clientes.create');        
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



                $clientes = new Clientes();
                $clientes->nombre = $request->nombre;
                $clientes->apellido_paterno = $request->apellido_paterno;
                $clientes->apellido_materno = $request->apellido_materno;
                $clientes->correo_electronico = $request->correo_electronico;
                $clientes->telefono = $request->telefono;
                $clientes->direccion = $request->direccion;
                $clientes->fecha_nacimiento = $request->fecha_nacimiento;
                $clientes->peso = $request->peso;
                $clientes->save();





                return response()->json(['success'=>'Se ha Agegado con Exito']);
            } catch (\Exception $e) {
              dd($e->getMessage());
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $datos['clientes'] = Clientes::find($id);
        return view('clientes.create')->with($datos);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        try {
            
            $clientes = Clientes::find($id);
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Clientes::find($id);
        $clientes->activo = 0;
        $clientes->save();



        return redirect()->route('clientes.index');
    }






}
