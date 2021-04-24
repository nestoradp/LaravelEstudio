

@extends('layouts.app')



@section('content')



    <div class="col-md-10 offset-1">
        <div class="panel-body">

    <table id="movimiento_list" class="table table-striped table-bordered" >
        <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Tipo Movimiento</th>
            <th scope="col">Categoria</th>
             <th scope="col">Cantidad</th>
             <th scope="col" >Opciones</th>
         </tr>
         </thead>
         <tbody>

         @foreach($movimientos as $movimiento)
             <tr >
                 <td>{{$movimiento->fecha_movimiento}}</td>
                 <td>{{$movimiento->tipo}}</td>
                 <td>{{$movimiento->Categoria->nombre}}</td>
                 <td>{{number_format($movimiento->getMoneyDecimal(),2)}}</td>
                 <td>
                  <a href="{{asset(route('movimiento.show', $movimiento->id))}}">  <button style="cursor: pointer" class="btn btn-sm btn-success bDetalles" data-identificador="">Detalles</button> </a>
                    <button style="cursor: pointer" class="btn btn-sm btn-danger bModificar"   data-nombre=""  data-identificador=""  ><i class="fas fa-cloud"></i>Editar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            {{--Paginador--}}
   {{--  <div class="offset-5">
      {{$movimientos->Links()}}
     </div>--}}
    </div>

    </div>









@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('datatable/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('datatable/js/dataTables.bootstrap4.min.js')}}"></script>

<script>

    $(document).ready(function() {
        $('#movimiento_list').dataTable();
    })
</script>

 @endsection