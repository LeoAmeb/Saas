<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use Mail;
use Session;
use App\Mail\PromocionEmail;
use App\Mail\Template_2;
use App\Clientes;
use App\Clientes_Promocion;
use App\Descuentos;
use App\Promociones;
use Auth;
use Illuminate\Support\Facades\DB;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $datos['promocion_table'] = Promociones::where("activo","1")->get();


        return view('promociones.index')->with($datos);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['clientes'] = Clientes::where('activo','1')->get();
        return view('promociones.create')->with($data);
           
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
                $DesdeNumero = 1;
                $HastaNumero = 10000;
                $numeroAleatorio = rand($DesdeNumero, $HastaNumero);  

                /////////////////////// fechas separadas ///////////////// 
                list($fecha_inicial,$fecha_final) = explode('-', $request->fecha_vigencia);
                /////////////////////// fecha inicial ///////////////////
                list($mes_inicial,$dia_inicial,$anio_inicial)=explode('/', $fecha_inicial);
                $fecha_inicial_vigencia = trim($anio_inicial).'-'.trim($mes_inicial).'-'.trim($dia_inicial);
                /////////////////////// fecha final ///////////////////
                list($mes_final,$dia_final,$anio_final)=explode('/', $fecha_final);
                $fecha_final_vigencia = trim($anio_final).'-'.trim($mes_final).'-'.trim($dia_final);


                
                    
                    if ($request->template == '1') {
                        foreach ($request->clientes_promocion as $key => $value_correo) {
                            $email = [$value_correo];
                            $subject = 'Promociones';
                            $message = $request->nombre_promocion.','.$request->descuentos_promocion.','.$request->descripcion.','.$numeroAleatorio.','.$fecha_inicial_vigencia.','.$fecha_final_vigencia;

                            Mail::to($email)->send( new PromocionEmail($subject,$message ));
                        }
                    }elseif($request->template == '2'){
                        foreach ($request->clientes_promocion as $key => $value_correo) {
                            $email = [$value_correo];
                            $subject = 'Promociones';
                            $message = $request->nombre_promocion.','.$request->descuentos_promocion.','.$request->descripcion.','.$numeroAleatorio.','.$fecha_inicial_vigencia.','.$fecha_final_vigencia;

                            Mail::to($email)->send( new Template_2($subject,$message ));
                        }
                    }
                   
                
                    
                

                $promocion = new Promociones();
                $promocion->nombre_promocion = $request->nombre_promocion;
                $promocion->descuentos_promocion = $request->descuentos_promocion;
                $promocion->descripcion = $request->descripcion;
                $promocion->template = $request->template;
                $promocion->serie_promocion = $numeroAleatorio;
                $promocion->fecha_inicial_vigencia = $fecha_inicial_vigencia;
                $promocion->fecha_final_vigencia = $fecha_final_vigencia;

                $promocion->save();

                
                foreach ($request->clientes_promocion as $value) {

                $clientes_promocion = new Clientes_Promocion();
                $clientes_promocion->id_promocion = $promocion->id;
                $clientes_promocion->clientes_promocion = $value;
                $clientes_promocion->save();
                }
                

                return response()->json(['success'=>'Se ha Enviado con Exito']);
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



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Promociones::find($id);
        $user->activo = 0;
        $user->save();



        return redirect()->route('promociones.index');
    }






}
