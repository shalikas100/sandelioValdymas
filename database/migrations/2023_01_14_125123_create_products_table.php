<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('kodas');
            $table->BigInteger('barkodas');
            $table->string('pavadinimas');
            $table->integer('likutis');
            $table->integer('svoris');
            $table->integer('vnt_dezeje');
            $table->unsignedBigInteger('gamintojas');
            $table->foreign('gamintojas')->references('id')->on('manufacturers');
            $table->string('tipas');
            $table->string('vieta_sandelyje');
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
