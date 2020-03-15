@extends('layouts.app')

@section('content')
<div class="col-md-12">
  <!-- MAP & BOX PANE -->
  <div class="box box-primary">
    <div class="box-header with-border">
      
      <h3 class="box-title"><i class="fa fa-users"></i> Usuarios  </h3>


      <div class="box-tools pull-right">
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary"> Nuevo Usuario</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">

    	  <table id="example" class="display" style="width:100%">
	        <thead>
	          <tr align="center">
              <th>Nombre de Usuario</th>
	            <th>Correo Electronico</th>
	            <th>Password</th>
	            <th>Tipo de Usuario</th>
	            <th>Acciones</th>
	          </tr>
	        </thead>
	        <tbody>
	          @foreach ($usuarios_table as $usuario)
                  <tr align="center">
                      <td>{{ $usuario->name }}</td>
                      <td>{{ $usuario->email }}</td>
                      <td>{{ $usuario->password_name }}</td>
                      <td><?php 
                        if ($usuario->tipo_user == 1) {
                          echo 'Administrador';
                        }else{
                          echo 'Usuario';
                        }
                        ?></td>
                      <td >
                        <form action="{{ route('usuarios.destroy',$usuario->id )}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning"><a href="{{ route('usuarios.edit',$usuario->id)}}" style="color:#fff;"><i class="fa fa-pencil"></i> Editar</a></button>
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

});
      
  } );
</script>
@endsection