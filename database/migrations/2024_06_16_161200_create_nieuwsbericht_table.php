<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNieuwsberichtTable extends Migration

{
    public function up()
    {
        Schema::create('nieuwsbericht', function (Blueprint $table) {
            $table->id('nieuwsid'); 
            $table->string('titel');
            $table->text('beschrijving');
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('categorie_id')->references('categorieid')->on('categorie')->onDelete('cascade');
            $table->foreign('user_id')->references('userid')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nieuwsbericht');
    }
}
