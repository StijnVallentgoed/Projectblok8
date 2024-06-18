<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('categorie', function (Blueprint $table) {
            $table->id('categorieid');
            $table->string('titel');
            $table->text('beschrijving');
            $table->dateTime('aanmaakdatum'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorie');
    }
};
