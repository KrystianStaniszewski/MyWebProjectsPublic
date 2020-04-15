<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogue', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('produit_image')->unsigned();
            $table->string('produit_type');
            $table->string('produit_name');
            $table->timestamps();
        });

        Schema::table('catalogue', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produit_type')->references('type')->on('produit');
            $table->foreign('produit_image')->references('image')->on('produit');
            $table->foreign('produit_name')->references('name')->on('produit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogue');
    }
}
