@extends('layouts.app')

@section('content')
<style type="text/css" media="screen">
.select2-container--default .select2-selection--multiple .select2-selection__choice {
background-color: 
#3c8dbc;
border-color:
#367fa9;
padding: 1px 10px;
color:
    #fff;
}
.my-custom-scrollbar {
position: relative;
height: 200px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<div class="col-md-12">
	<div class="box box-primary">
	    <div class="box-header with-border">
	    	@isset($usuarios)
	    	<h3 class="box-title">Actualizar Usuario</h3>
			@else
			<h3 class="box-title">Nuevo Usuario</h3>
			@endisset
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->


	        <form >

	      <div class="box-body">
	      	<div class="col-md-6">
	      	<div class="form-group">
	          <label for="exampleInputPassword1">Nombre del Usuario</label>
	          <input type="text" class="form-control" name="name" placeholder="Nombre de Articulo" value="@isset($usuarios){{ $usuarios->name }}@endisset">
	        </div>
	    	</div>
	    	<div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleInputEmail1">Correo Electronico</label>
		          <input type="text" class="form-control" name="email" placeholder="Correo Electronico" value="@isset($usuarios){{ $usuarios->email }}@endisset">
		        </div>
	    	</div>
	    	<div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleInputPassword1">Password</label>
		          <input type="text" class="form-control" name="password" placeholder="Password" value="@isset($usuarios){{ $usuarios->password_name }}@endisset">
		        </div>
		    </div>

		    

	        <div class="col-md-6">
              	<div class="form-group">
	                <label>Tipo de Usuario</label>
	                <select class="form-control select2 " style="width: 100%;"  name="tipo_user" tabindex="-1" aria-hidden="true">
	                 <option >Elige una Oción de Usuario</option>
	                 <option value="1">Administrador</option>
	                 <option value="2">Usuario</option>
	                </select>
            	</div>
              
            </div>
            

	      </div>
	      <!-- /.box-body -->

	      <div class="box-footer">
	      	<a href="{{ url('usuarios') }}" ><button type="button" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar</button></a>
	      	@isset($usuarios)
	      	<button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-repeat"></i> Actualizar</button>
	      	@else
	        <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Agregar</button>
	        @endisset
	      </div>
	    </form>
	  </div>
</div>



<script>

	$(document).ready( function () {



		$(".btn-submit").click(function(e){
        e.preventDefault();
        ////////// limpieza

        var name = $('input[name=name]').val();
        var email = $('input[name=email]').val();
        var password = $('input[name=password]').val();
        var tipo_user = $('select[name=tipo_user]').val();


        if(name == ' ' || email == ' ' || password == ' ' || tipo_user == ' '  ){
        	swal({title: "Cuidado!", text: "No Existen Permisos Nuevos", type: "warning"}, function(){ } );
        }else{
        	$.ajax({

	           type:"{{ ( isset($usuarios) ? 'PUT' : 'POST' ) }}",

	           url:"{{ ( isset($usuarios) ) ? '/usuarios/' . $usuarios->id : '/usuarios/create' }}",
	           headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				     },
	           data:{
				name:name,
				email:email,
				password:password,
				tipo_user:tipo_user,
				
	           },
	           
	            success:function(data){
	                swal({title: "Felicidades!", text: data.success, type: "success"}, function(){ location.href ="{{ url('usuarios') }}"; } );
	            }


	        });
        }


        	

       
        });
	    
}); 


	
</script>
@endsection