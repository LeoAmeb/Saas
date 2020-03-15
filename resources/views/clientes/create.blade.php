@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="box box-primary">
	    <div class="box-header with-border">
	    	@isset($clientes)
	    	<h3 class="box-title">Actualizar Cliente</h3>
			@else
			<h3 class="box-title">Nuevo Cliente</h3>
			@endisset
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form role="form">
	      <div class="box-body">

	      	<div class="row">

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Nombre del Cliente</label>
			          <input type="text" class="form-control" name="nombre" placeholder="Nombre del Cliente" value="@isset($clientes){{ $clientes->nombre }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Apellido Paterno</label>
			          <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" value="@isset($clientes){{ $clientes->apellido_paterno }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Apellido Materno</label>
			          <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" value="@isset($clientes){{ $clientes->apellido_materno }}@endisset">
			        </div>
	      		</div>
	      		
	      	</div>

	      	<div class="row">

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Correo Electronico</label>
			          <input type="text" class="form-control" name="correo_electronico" placeholder="Correo Electronico" value="@isset($clientes){{ $clientes->correo_electronico }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Telefono</label>
			          <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="@isset($clientes){{ $clientes->telefono }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Dirección</label>
			          <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="@isset($clientes){{ $clientes->direccion }}@endisset">
			        </div>
	      		</div>


	      	</div>

	      	<div class="row">
	      		<div class="col-md-6">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Fecha de Nacimiento</label>
			          <input type="text" class="form-control" id="datepicker" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" value="@isset($clientes){{ $clientes->fecha_nacimiento }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-6">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Peso</label>
			          <input type="text" class="form-control" name="peso" placeholder="Peso del Cliente" value="@isset($clientes){{ $clientes->peso }}@endisset">
			        </div>
	      		</div>

	      	</div>

	        

	        

	        
	        
	      </div>
	      <!-- /.box-body -->

	      <div class="box-footer">
	      	<a href="{{ url('clientes') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar</a>
	      	@isset($clientes)
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

        var nombre = $("input[name=nombre]").val();
        var apellido_paterno = $("input[name=apellido_paterno]").val();
        var apellido_materno = $("input[name=apellido_materno]").val();
        var correo_electronico = $("input[name=correo_electronico]").val();
        var telefono = $("input[name=telefono]").val();
        var direccion = $("input[name=direccion]").val();
        var fecha_nacimiento = $("input[name=fecha_nacimiento]").val();
        var peso = $("input[name=peso]").val();




        if(nombre == '' || apellido_paterno == '' || correo_electronico == '' ){

        	
        	swal("Upss!", "Lo sentimos Campos Vacios", "warning");
        	

        }else{

        	$.ajax({

	           type:"{{ ( isset($clientes) ? 'PUT' : 'POST' ) }}",

	           url:"{{ ( isset($clientes) ) ? '/clientes/' . $clientes->id : '/clientes/create' }}",
	           headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				     },
	           data:{
				nombre:nombre,
				apellido_paterno:apellido_paterno,
				apellido_materno:apellido_materno,
				correo_electronico:correo_electronico,
				telefono:telefono,
				direccion:direccion,
				fecha_nacimiento:fecha_nacimiento,
				peso:peso,
	           },
	           
	            success:function(data){
	                swal({title: "Felicidades!", text: data.success, type: "success"}, function(){ location.href ="{{ url('clientes') }}"; } );
	            }


	        });

        }

  });
}); 
</script>
@endsection