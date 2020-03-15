@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
	    <div class="box-header with-border">
	    	@isset($ingresos)
	    	<h3 class="box-title">Actualizar Ingreso</h3>
			@else
			<h3 class="box-title">Nuevo Ingreso</h3>
			@endisset
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form role="form">
	      <div class="box-body">

	      	<div class="row">

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Descripcion</label>
			          <input type="text" class="form-control" name="descripcion" placeholder="Descripcion" value="@isset($ingresos){{ $ingresos->descripcion }}@endisset">
			        </div>
	      		</div>

	      		<div class="col-md-4">
	      			<div class="form-group">
			          <label for="exampleInputPassword1">Monto</label>
			          <input type="number" step="0.10" class="form-control" name="monto" placeholder="Monto $" value="@isset($ingresos){{ $ingresos->monto }}@endisset">
			        </div>
	      		</div>


			    <div class="col-md-6 ">
			        <div class="form-group">
			          <label for="exampleInputPassword1">Clientes</label>
				          <select class="form-control select2 select2-hidden-accessible " name="id_cliente" multiple="" data-placeholder="Selecciona Clientes" style="width: 100%;" tabindex="-1" aria-hidden="true">
			              @foreach($clientes as $cliente)
			              <option class="select2-selection--multiple" value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</option>
			              @endforeach
			            </select>
			        </div>
			    </div>


	      	</div>	        
	      </div>
	      <!-- /.box-body -->

	      <div class="box-footer">
	      	<a href="{{ url('ingresos') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar</a>
	      	@isset($ingresos)
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

        var descripcion = $("input[name=descripcion]").val();
        var monto = $("input[name=monto]").val();
        var id_cliente = $("input[name=id_cliente]").val();

        if(descripcion == '' || monto == '' || id_cliente == ''){
        	swal("Upss!", "Lo sentimos Campos Vacios", "warning");
        }else{
        	$.ajax({
	           type:"{{ ( isset($ingresos) ? 'PUT' : 'POST' ) }}",
	           url:"{{ ( isset($ingresos) ) ? '/ingresos/' . $ingresos->id : '/ingresos/create' }}",
	           headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				     },
	           data:{
	           	descripcion:descripcion,
	           	monto:monto,
	           	id_cliente
	           },
	           
	            success:function(data){
	                swal({title: "Felicidades!", text: data.success, type: "success"}, function(){ location.href ="{{ url('ingresos') }}"; } );
	            }

	        });
        }
  });
}); 
</script>
@endsection