<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table){
            $table->string('sku')->primary();
            $table->string('nombre');
            $table->string('descripcion');
            $table->double('valor');
            $table->unsignedBigInteger('tienda');
            $table->string('imagen');
            $table->tinyInteger('delete_producto')->default(0);

            $table->foreign('tienda')->references('id')->on('tienda')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
