<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 191);
            $table->string('lote', 191);
            //Solo recibimos enteros positivos
            $table->smallInteger('cantidad');
            $table->date('fecha_vencimiento');
            // Se declara decimal de 10,2
            $table->unsignedDecimal('precio', 10,2);
            $table->foreignId('proveedor_id')->constrained('proveedors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
