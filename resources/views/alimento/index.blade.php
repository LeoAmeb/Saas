@extends('layouts.app')

@section('content')
<div class="col-md-12">
  <!-- MAP & BOX PANE -->
  <div class="box box-primary">
    <div class="box-header with-border">
     
      <h3 class="box-title"><i class="fa fa-user"></i> Alimentos </h3>


      <div class="box-tools pull-right">
        <a href="{{ route('alimento.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Alimento</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">

    	  <table id="example" class="display" style="width:100%">
	        <thead>
	          <tr align="center">
              <th>Nombre</th>
              <th>Agua</th>
              <th>Azucar</th>
              <th>Carbohitrados</th>
              <th>Lipidos</th>
              <th>Proteinas</th>
              <th>Fibra</th>
	            <th>Calcio</th>
              <th>Hierro</th>
              <th>Magenesio</th>
              <th>Fosforo</th>
              <th>Potasio</th>
              <th>Sodio</th>
              <th>Cobre</th>


	          </tr>
	        </thead>
	        <tbody>
	          @foreach ($alimentos_table as $alimentos)
                  <tr align="center">
                      <td>{{ $alimentos->nombre }}</td>
                      <td>{{ $alimentos->agua}}</td>
                      <td>{{ $alimentos->azucar}}</td>
                      <td>{{ $alimentos->hdec}}</td>
                      <td>{{ $alimentos->lipidos}}</td>
                      <td>{{ $alimentos->proteina}}</td>
                      <td>{{ $alimentos->fibra}}</td>
                      <td>{{ $alimentos->calcio}}</td>
                      <td>{{ $alimentos->hierro}}</td>
                      <td>{{ $alimentos->magnesio}}</td>
                      <td>{{ $alimentos->fosforo}}</td>
                      <td>{{ $alimentos->potasio}}</td>
                      <td>{{ $alimentos->sodio}}</td>
                      <td>{{ $alimentos->cobre}}</td>

                      <td >
                        <form action="{{ route('alimento.destroy',$alimentos->id )}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning"><a href="{{ route('alimento.edit',$alimentos->id)}}" style="color:#fff;"><i class="fa fa-pencil"></i> Editar</a></button>
                          <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Eliminar</button>
                        </div>
                        </form>
                      </td>
                  </tr>
                @endforeach
	        </tbody>
	      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</div>
<script>
  $(document).ready(function() {
      
      $('#example').DataTable({
    
    "scrollY": 300,
    "scrollX": true,
    "pagingType": "full_numbers",
   language: {
    processing:     "Tratamiento en curso...",
    search:         "Buscar&nbsp;:",
    lengthMenu:    "Mostrando _MENU_ registros por página",
    info:           "Mostrando página _START_ a _TOTAL_ Elementos",
    infoEmpty:      "No hay registros disponibles",
    infoFiltered:   "(Filtrado de _MAX_ registros totales)",
    infoPostFix:    "",
    loadingRecords: "Cargando...",
    zeroRecords:    "Ningun Resgistro",
    emptyTable:     "No hay datos disponibles por el momento.",
    paginate: {
        first:      "Primeramente",
        previous:   "Anteriormente",
        next:       "Siguiente",
        last:       "Ultimo"
    },
    aria: {
        sortAscending:  ": Activar para ordenar la columna en orden ascendente.",
        sortDescending: ": Activar para ordenar la columna en orden descendente."
    }
},
dom: 'B<"clear">lfrtip',
    buttons: [
        'colvis'
    ],
});
      
  } );
</script>
@endsection