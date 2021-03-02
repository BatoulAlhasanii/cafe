<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlavorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flavor_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flavor_id');
            $table->foreign('flavor_id')->references('id')->on('flavors');
            $table->string('name');
            $table->char('lang',2);
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
        Schema::dropIfExists('flavor_translations');
    }
}
