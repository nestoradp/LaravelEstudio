<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\MovimientoValidacionRequest;
use App\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //  $movimientos = Movimiento::where('user_id', auth()->user()->id)->orderBy('fecha_movimiento','asc')->paginate();//Opcion con el paginador
        $movimientos = Movimiento::where('user_id', auth()->user()->id)->orderBy('fecha_movimiento','asc')->get();
            //  return $movimientos;

     return view('vistas.listado_movimientos', compact('movimientos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::orderBy('nombre')->get();



        return view('formularios.vistar_crear_mov', compact('categoria'));







    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovimientoValidacionRequest $request)
    {
        $request->request->remove('_token');
      $movimiento = new Movimiento($request->all());

        $movimiento->dinero = $request->get('dinero')*100;

      $categoria= $request->get('categoria_id');

      if(!is_numeric($categoria)){

          $newCategoria = Categoria::firstOrCreate(['nombre'=> ucwords($categoria)]);
        $movimiento->categoria_id = $newCategoria->id;
      }
    $movimiento->user_id = auth()->user()->id;

        if($request->hasFile('image')){
            $imagen =$request->file('imagen');
            $file =$imagen->store('imagenes/movimiento');
            $movimiento->imagen = $file;
        }

          $respuesta= $movimiento->save();
           if($respuesta)
               return redirect()->route('movimiento.show', $movimiento)->with('success', 'Movimiento Registrado');
         else
             return redirect()->route('movimiento.create')->with('error', 'Error al registrar el movimiento');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $movimiento = Movimiento::where('user_id', auth()->user()->id)->where("id",$id)->first();


    return view('vistas.mostrar_movimento', compact('movimiento'));







    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
