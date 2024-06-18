<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNieuwsTagTable extends Migration
{
    public function up()
    {
        Schema::create('nieuwsberichtentag', function (Blueprint $table) {
            $table->id('nieuwsberichttag');
            $table->unsignedBigInteger('nieuwsbericht_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('nieuwsbericht_id')->references('nieuwsid')->on('nieuwsbericht')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id')->references('tagid')->on('tags')->onUpdate('cascade')->onDelete('cascade');

            // Optionally, you can add timestamps if needed
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nieuwsbericht_tag');
    }
}
