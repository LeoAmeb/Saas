<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;

use Auth;
use Mail;
use Session;
use App\Mail\SendEmail;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $datos['usuarios_table'] = User::where([['activo','1']])->orderBy('id','DESC')->get();

        return view('usuarios.index')->with($datos);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        
        return view('usuarios.create');        
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


                    
                    $tienda = new User();
                    $tienda->name = $request->name;
                    $tienda->email = $request->email;
                    $tienda->password = bcrypt($request->password);
                    $tienda->password_name = $request->password;
                    $tienda->tipo_user = $request->tipo_user;
                    $tienda->save();
                


                    $email = $request->email;
                    $subject = 'Cuenta de Usuario';
                    $message = $request->email.','.$request->password;

                    Mail::to($email)->send( new SendEmail($subject,$message ));
                

                


                //return redirect()->route('usuarios.index');
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
       
        $datos['usuarios'] = User::find($id);
       
         
        return view('usuarios.create')->with($datos);    
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
            
            
                    $usuario = User::find($id);
                    $usuario->name = $request->name;
                    $usuario->email = $request->email;
                    $usuario->password = bcrypt($request->password);
                    $usuario->password_name = $request->password;
                    $usuario->tipo_user = $request->tipo_user;
                    $usuario->save();
                
                    return response()->json(['success'=>'Se ha Editado con Exito']);

                    $email = $request->email;
                    $subject = 'Actualizacion de Password';
                    $message = $request->email.','.$request->password;

                    Mail::to($email)->send( new SendEmail($subject,$message ));
                    

           

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
        $tienda = User::find($id);
        $tienda->activo = 0;
        $tienda->save();


        return redirect()->route('usuarios.index');
    }





    






}
