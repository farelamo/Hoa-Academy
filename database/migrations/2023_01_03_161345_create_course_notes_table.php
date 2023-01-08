<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('course_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('last_chapter')->unsigned();
            $table->integer('total_chapter')->unsigned();
            $table->boolean('finished');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_notes');
    }
};
