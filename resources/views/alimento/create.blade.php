@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
	    <div class="box-header with-border">
	    	@isset($alimento)
	    	<h3 class="box-title">Actualizar Alimento</h3>
			@else
			<h3 class="box-title">Nuevo Alimento</h3>
			@endisset
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form role="form">
	      <div class="box-body">

	      	<div class="row">

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Nombre del Alimento</label>
			          <input type="text" class="form-control" name="nombre" placeholder="Nombre del Alimento" value="@isset($alimento){{ $alimento->nombre }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Agua</label>
			          <input type="number" step="0.01" class="form-control" name="agua" placeholder="Agua (g)" value="@isset($alimento){{ $alimento->agua }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Azucar</label>
			          <input type="number" step="0.01" class="form-control" name="azucar" placeholder="Azucar (g)" value="@isset($alimento){{ $alimento->azucar }}@endisset">
			        </div>
	      		</div>
	      		
	      	</div>

	      	<div class="row">

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Carbohidratos</label>
			          <input type="number" step="0.01" class="form-control" name="hdec" placeholder="Carbohidratos (g)" value="@isset($alimento){{ $alimento->hdec }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Lipidos</label>
			          <input type="number" step="0.01" class="form-control" name="lipidos" placeholder="Lipidos (g) " value="@isset($alimento){{ $alimento->lipidos }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Proteínas</label>
			          <input type="number" step="0.01" class="form-control" name="proteina" placeholder="Proteinas (g)" value="@isset($alimento){{ $alimento->proteinas }}@endisset">
			        </div>
	      		</div>


	      	</div>

	      	<div class="row">
	      		<div class="col-md-6">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Fibra</label>
			          <input type="number" step="0.01" class="form-control" name="fibra" placeholder="Fibra (g)" value="@isset($alimento){{ $alimento->fibra }}@endisset">
			        </div>

    	      	<div class="form-group">
					<label for="exampleInputPassword1">Calcio</label>
					<input type="number" step="0.01" class="form-control" name="calcio" placeholder="Calcio (mg)" value="@isset($alimento){{ $alimento->calcio }}@endisset">
			        </div>
	      		</div>


	      		<div class="col-md-6">
			        <div class="form-group">
						<label for="exampleInputPassword1">Hierro</label>
						<input type="number" step="0.01" class="form-control" name="hierro" placeholder="Hierro (mg)" value="@isset($alimento){{ $alimento->hierro }}@endisset">
			        </div>
			        <div class="form-group">
						<label for="exampleInputPassword1">Magnesio</label>
						<input type="number" step="0.01" class="form-control" name="magnesio" placeholder="Magnesio (mg)" value="@isset($alimento){{ $alimento->magnesio }}@endisset">
			        </div>			        
	      		</div>

	      	</div>

	      	<div class="row">
	      		<div class="col-md-6">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Fosforo</label>
			          <input type="number" step="0.01" class="form-control"  name="fosforo" placeholder="Fosforo (mg)" value="@isset($alimento){{ $alimento->fosforo }}@endisset">
			        </div>

    	      	<div class="form-group">
					<label for="exampleInputPassword1">Potasio</label>
					<input type="number" step="0.01" class="form-control" name="potasio" placeholder="Potasio (mg)" value="@isset($alimento){{ $alimento->potasio }}@endisset">
			        </div>
	      		</div>


	      		<div class="col-md-6">
			        <div class="form-group">
						<label for="exampleInputPassword1">Sodio</label>
						<input type="number" step="0.01" class="form-control" name="sodio" placeholder="Sodio (mg)" value="@isset($alimento){{ $alimento->sodio }}@endisset">
			        </div>
			        <div class="form-group">
						<label for="exampleInputPassword1">Cobre</label>
						<input type="number" step="0.01" class="form-control" name="cobre" placeholder="Cobre (mg)" value="@isset($alimento){{ $alimento->cobre }}@endisset">
			        </div>			        
	      		</div>
	      	</div>

	        

	        

	        
	        
	      </div>
	      <!-- /.box-body -->

	      <div class="box-footer">
	      	<a href="{{ url('alimento') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar</a>
	      	@isset($alimento)
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
        var agua = $("input[name=agua]").val();
        var azucar = $("input[name=azucar]").val();
        var hdec = $("input[name=hdec]").val();
        var lipidos = $("input[name=lipidos]").val();
        var proteina = $("input[name=proteina]").val();
        var fibra = $("input[name=fibra]").val();
        var calcio = $("input[name=calcio]").val();
        var hierro = $("input[name=hierro]").val();
        var magnesio = $("input[name=magnesio]").val();
        var fosforo = $("input[name=fosforo]").val();
        var potasio = $("input[name=potasio]").val();
        var sodio = $("input[name=sodio]").val();
        var cobre = $("input[name=cobre]").val();

        if(nombre == '' || azucar == '' || agua == ''|| hdec == '' || lipidos == ''){
        	swal("Upss!", "Lo sentimos Campos Vacios", "warning");
        }else{
        	$.ajax({
	           type:"{{ ( isset($alimento) ? 'PUT' : 'POST' ) }}",
	           url:"{{ ( isset($alimento) ) ? '/alimento/' . $alimento->id : '/alimento/create' }}",
	           headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				     },
	           data:{
	           	nombre:nombre,
				agua:agua,
				azucar:azucar,
				hdec:hdec,
				lipidos:lipidos,
				proteina:proteina,
				fibra:fibra,
				calcio:calcio,
				hierro:hierro,
				magnesio:magnesio,
				fosforo:fosforo,
				potasio:potasio,
				sodio:sodio,
				cobre:cobre
	           },
	           
	            success:function(data){
	                swal({title: "Felicidades!", text: data.success, type: "success"}, function(){ location.href ="{{ url('alimento') }}"; } );
	            }


	        });

        }

  });
}); 
</script>
@endsection