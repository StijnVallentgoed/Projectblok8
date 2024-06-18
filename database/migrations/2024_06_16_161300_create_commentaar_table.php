<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentaarTable extends Migration
{
    public function up()
    {
        Schema::create('commentaar', function (Blueprint $table) {
            $table->id('commentaarid'); 

            $table->text('bericht');
            $table->dateTime('aanmaakdatum');
            $table->unsignedBigInteger('usersid');
            $table->foreign('usersid')->references('userid')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('nieuwsbericht_id');
            $table->foreign('nieuwsbericht_id')->references('nieuwsid')->on('nieuwsbericht')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commentaar');
    }
}

