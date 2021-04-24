@extends('layouts.app')


@section('content')

    

        <div class="col-md-7 offset-3">
       <div class="panel-body">
           <h5 class="text-capitalize text-primary text-center">Movimiento Registrado {{$movimiento->id}} </h5>
    <table class="table table-bordered">

       <tr>
          <th>Operacion Id</th>
           <td>{{$movimiento->id}}   </td>
       </tr>
        <tr>
            <th>Tipo Movimiento</th>
            <td>{{$movimiento->tipo}}   </td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{{$movimiento->fecha_movimiento}}   </td>
        </tr>
        <tr>
            <th>categoria</th>
            <td>{{$movimiento->Categoria->nombre}}   </td>
        </tr>
        <tr>
            <th>Dinero</th>
            <td>{{  number_format($movimiento->getMoneyDecimal(),2)}}   </td>
        </tr>
        <tr>
            <th>Descripcion del Movimiento:</th>
            <td>{{$movimiento->descripcion}}   </td>
        </tr>
                @if($movimiento->imagen){
        <tr>
            <th>Imagen del Recibo:</th>
            <td><a href="{{asset($movimiento->imagen)}}" class="thumbnail" target="_blank" > <img src="{{asset($movimiento->imagen)}}" class="img-responsive"></a> </td>
        </tr>
                }
                    @endif
   </table>

        </div>
        </div>







 @endsection