<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo',50);
            $table->dateTime('fecha_movimiento');
            $table->unsignedInteger('categoria_id');
            $table->string('descripcion',1000);
            $table->string('imagen')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('dinero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
