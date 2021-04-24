@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h5 class="text-center"> Registrar un nuevo movimiento</h5></div>

             <div class="panel-body">

                 <form class="needs-validation" novalidate  action="{{route('movimiento.store')}}" method="post">
                     {{csrf_field()}}

                     <div class="form-row" >

                         <div class="col-md-6 mb-3" {{$errors->has('fecha_movimiento') ? 'has-error' : ''}}>
                             <label for="fecha_movimiento">Fecha</label>
                             <input type="date" class="form-control"  id="validationCustom01" name="fecha_movimiento" required >

                             <div class="valid-feedback">
                               <span class="alert-success">
                                   <strong>Correcto</strong>
                               </span>
                             </div>
                             <div class="invalid-feedback">
                                 <span class="alert-danger">
                                   <strong>Incorrecto</strong>
                                 </span>
                             </div>

                              @if($errors->has('fecha_movimiento'))
                                   <span class="alert-danger">
                                   <strong>{{$errors->first('fecha_movimiento')}}</strong>


                                   </span>
                                  @endif

                         </div>


                         <div class="col-md-6 mb-3" {{$errors->has('tipo') ? 'has-error' : ''}}>
                             <label for="tipo">Tipo</label>
                             <select class="custom-select" id="validationCustom02"   name="tipo" required>
                                 <option selected disabled value="">Tipo...</option>
                                 <option>Ingreso</option>
                                 <option>Gasto</option>
                             </select>
                             <div class="valid-feedback">
                               <span class="alert-success">
                                   <strong>Correcto</strong>
                               </span>
                             </div>
                             <div class="invalid-feedback">
                                 <span class="alert-danger">
                                   <strong>Incorrecto</strong>
                                 </span>
                             </div>
                         </div>
                         @if($errors->has('tipo'))
                             <span class="alert-danger">
                                   <strong>{{$errors->first('tipo')}}</strong>


                                   </span>
                         @endif




                     </div>


                     <div class="form-row">

                         <div class="col-md-6 mb-3" {{$errors->has('categoria_id') ? 'has-error' : ''}}>
                             <label for="categoria_id">Categoria</label>
                             <select class="custom-select" id="validationCustom03" name="categoria_id" required>
                                 <option selected disabled >Tipo de Categoria</option>
                                  @foreach($categoria as $cat)

                                 <option value="{{$cat->id}}">{{$cat->nombre}}</option>

                                   @endforeach
                             </select>
                             <div class="valid-feedback">
                               <span class="alert-success">
                                   <strong>Correcto</strong>
                               </span>
                             </div>
                             <div class="invalid-feedback">
                                 <span class="alert-danger">
                                   <strong>Incorrecto</strong>
                                 </span>
                             </div>
                             @if($errors->has('categoria_id'))
                                 <span class="alert-danger">
                                   <strong>{{$errors->first('categoria_id')}}</strong>


                                   </span>
                             @endif



                         </div>


                         <div class="col-md-6 mb-3" {{$errors->has('dinero') ? 'has-error' : ''}}>
                             <label for="dinero">Monto</label>
                             <input type="number" class="form-control" id="validationCustom04" name="dinero" placeholder="Dinero" min="0.01"  step="0.01"  required>
                             <div class="valid-feedback">
                               <span class="alert-success">
                                   <strong>Correcto</strong>
                               </span>
                             </div>
                             <div class="invalid-feedback">
                                 <span class="alert-danger">
                                   <strong>Incorrecto</strong>
                                 </span>
                             </div>
                             @if($errors->has('dinero'))
                                 <span class="alert-danger">
                                   <strong>{{$errors->first('dinero')}}</strong>


                                   </span>
                             @endif

                         </div>

                     </div>



                     <div class="form-group">

                         <div class="mb-3"  {{$errors->has('descripcion') ? 'has-error' : ''}}>
                             <label for="descripcion">Descripcion</label>
                             <textarea class="form-control" id="validationCustom05" name="descripcion" placeholder="Descripcion del movimiento" required></textarea>
                             <div class="valid-feedback">
                               <span class="alert-success">
                                   <strong>Correcto</strong>
                               </span>
                             </div>
                             <div class="invalid-feedback">
                                 <span class="alert-danger">
                                   <strong>Incorrecto</strong>
                                 </span>
                             </div>

                         </div>
                         @if($errors->has('descripcion'))
                             <span class="alert-danger">
                                   <strong>{{$errors->first('descripcion')}}</strong>


                                   </span>
                         @endif
                     </div>




                     <div class="form-row">
                         <div class="col-md-6 mb-3" {{$errors->has('imagen') ? 'has-error' : ''}}>
                             <label class="custom-file-label" for="imagen">Imagen</label>
                             <input type="file" class="custom-file-input" name="imagen" id="validationCustom06" >
                             <div class="valid-feedback">
                               <span class="alert-success">
                                   <strong>Correcto</strong>
                               </span>
                             </div>
                             <div class="invalid-feedback">
                                 <span class="alert-danger">
                                   <strong>Incorrecto</strong>
                                 </span>
                             </div>

                             @if($errors->has('imagen'))
                                 <span class="alert-danger">
                                   <strong>{{$errors->first('imagen')}}</strong>


                                   </span>
                             @endif



                         </div>


                     </div>


                      <div class="col-md-12 offset-8 ">


                          <button class="btn btn-secondary" type="reset"  >Cancelar</button>
                          <button class="btn btn-primary" type="submit">Registar</button>

                    </div>

                 </form>



             </div>
         </div>
     </div>
    </div>
</div>


    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');






                }, false);
            });
        }, false);
    })();
</script>




 @endsection


@section('scripts')
    <script type="text/javascript" src="{{asset('select2/select2.min.js')}}"></script>

    <script>

        $('#validationCustom03').select2({
              tags:true

        });


  </script>





 @endsection

