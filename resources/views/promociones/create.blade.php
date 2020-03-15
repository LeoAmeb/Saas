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
</style>
<div class="col-md-12">
	<div class="box box-primary">
	    <div class="box-header with-border">
	    	@isset($promocion)
	    	<h3 class="box-title">Actualizar Promoción</h3>
			@else
			<h3 class="box-title">Nueva Promoción</h3>
			@endisset
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form role="form">
	      <div class="box-body">
		      	<div class="row">
		      		<div class="col-md-6 ">
			      	<div class="form-group">
			          <label for="exampleInputPassword1">Nombre de Promoción</label>
			          <input type="text" class="form-control" name="nombre_promocion" placeholder="Nombre de Promoción" value="@isset($promocion){{ $promocion->nombre_promocion }}@endisset">
			        </div>
			    </div>
			    <div class="col-md-6 ">
			        <div class="form-group">
			          <label for="exampleInputPassword1">Clientes</label>
				          <select class="form-control select2 select2-hidden-accessible " name="clientes_promocion" multiple="" data-placeholder="Selecciona Clientes" style="width: 100%;" tabindex="-1" aria-hidden="true">
			              @foreach($clientes as $cliente)
			              <option class="select2-selection--multiple" value="{{ $cliente->correo_electronico }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</option>
			              @endforeach
			            </select>
			        </div>
			    </div>
	      	</div>

	      	<div class="row">
	      		<div class="col-md-6 ">
	      			<div class="form-group">
	      			<label for="exampleInputPassword1">Descuentos</label>
	      			<div class="input-group">
		                <input type="number" class="form-control" name="descuentos_promocion" min="1" max="100" placeholder="Descuentos" value="@isset($promocion){{ $promocion->descuentos_promocion }}@endisset">
		                <span class="input-group-addon"><strong>%</strong></span>
		              </div>
		            </div>

		    </div>

		    <div class="col-md-6 ">
		    		<label>Fecha de Vigencia de Promoción</label>
		    		<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="reservation" >
		                </div>
		                <!-- /.input group -->
		              </div>
		    	</div>

		    

		    </div>
		    <p><strong>Estilos de Correo Electronico</strong></p>


		    <div class="row">
		    	
		    	<div class="col-md-4 ">
		    		<div class="radio">
                    <label>
                      
                      <input type="radio" name="myRadio"  value="1" checked="">
                      <p>Estilo de Correo Electronico 1</p>
                      <div class="card" style="width: 18rem;">
					  <img src="{{ asset('Admin/dist/img/template_1.jpeg') }}" class="img-thumbnail" alt="...">
					  <div class="card-body">
					    <p class="card-text"></p>
					  </div>
					</div>

                    </label>
                  </div>
		    		
		    	</div>
		    	<div class="col-md-4 ">
		    		<div class="radio">
                    <label>
                    
                      <input type="radio" name="myRadio"  value="2">
                      <p>Estilo de Correo Electronico 2</p>
                      <div class="card" style="width: 18rem;">
						  <img src="{{ asset('Admin/dist/img/template_2.jpeg') }}" class="img-thumbnail" alt="...">
						  <div class="card-body">
						    <p class="card-text"></p>
						  </div>
						</div>
                      
                    </label>
                  </div>
		    		
		    	</div>


		    	<div class="col-md-4 ">
			        <div class="form-group">
			          <label for="exampleInputPassword1">Descripción <small style="color:red;font-size:10px;">* No poner comas en el texto de descripción</small></label>
			          <textarea class="form-control" rows="6" name="descripcion" placeholder="Descripción ...">@isset($promocion){{ $promocion->descripcion }}@endisset</textarea>
			        </div>
		      	</div>

		    	


		    </div>



	        
	      </div>
	      <!-- /.box-body -->
	      <div class="box-footer">
	      	<a href="{{ url('promociones') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar</a>
	      	@isset($promocion)
	      	<button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-repeat"></i> Actualizar</button>
	      	@else
	        <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-send"></i> Enviar</button>
	        @endisset
	      </div>
	    </form>
	  </div>
</div>

<script>
	$(document).ready( function () {
	    $(".btn-submit").click(function(e){
        e.preventDefault();

        var nombre_promocion = $("input[name=nombre_promocion]").val();

        var clientes_promocion = $("select[name=clientes_promocion]").val();

        var descuentos_promocion = $("input[name=descuentos_promocion]").val();

        var descripcion = $("textarea[name=descripcion]").val();

        var radio = $('input:radio:checked').prop('checked', true);

        var fecha_vigencia = $('#reservation').val();


		var template = radio[0].value;

        if(nombre_promocion == '' || descuentos_promocion == ''){

        	
        	swal("Upss!", "Lo sentimos Campos Vacios", "warning");
        	

        }else{

        	$.ajax({

	           type:"{{ ( isset($promocion) ? 'PUT' : 'POST' ) }}",

	           url:"{{ ( isset($promocion) ) ? '/promociones/' . $promocion->id : '/promociones/create' }}",
	           headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				     },
	           data:{
	           	nombre_promocion:nombre_promocion,
				clientes_promocion:clientes_promocion,
				descuentos_promocion:descuentos_promocion,
				descripcion:descripcion,
				template:template,
				fecha_vigencia:fecha_vigencia,
				
	           },
	           
	            success:function(data){
	      			swal({title: "Felicidades!", text: data.success, type: "success"}, function(){ location.href ="{{ url('promociones') }}"; } );
	            }


	        });

        }

  });
}); 
</script>

@endsection