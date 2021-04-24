<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MovimientoValidacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return Auth::check();  //Devuelve si el usuario esta autenticado

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo' =>['required', Rule::in(['Gasto','Ingreso'])],
            'fecha_movimiento' =>'required|date',
            'categoria_id' =>'required',
            'dinero'=>'required|numeric|min:0.01',
            'descripcion' =>'required|min:3|max:1000'

        ];
    }
}
