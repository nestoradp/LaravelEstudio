<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{

 protected $table ='movimientos';

 protected $fillable=[
     'tipo',
     'fecha_movimiento',
     'categoria_id',
     'descripcion',
     'dinero'


 ];
protected $fecha =['fecha_movimiento']; // Convierte el atributo fecha_movimiento a formato fecha de php

 public function getMoneyDecimal(){
     //funcion que devuelve el atributo dinero divido entre 100
     return $this->attributes['dinero']/100;
 }

// Funcion que establece relacion entre movimiento y usuarios
 public function user(){

     return $this->belongsTo(User::class);
 }




//relacion movimiento categoria

public function Categoria(){
    return $this->belongsTo(Categoria::class);
}


}