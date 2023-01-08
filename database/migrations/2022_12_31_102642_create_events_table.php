<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_desc');
            $table->text('desc');
            $table->date('date');
            $table->string('start');
            $table->string('end');
            $table->text('image')->nullable();
            $table->integer('max')->unsigned();
            $table->integer('type')->unsigned(); // lomba = 0, seminar = 1
            $table->integer('meet_type')->unsigned(); // online = 1, offline = 2
            $table->text('link')->nullable(); // required if online
            $table->text('location')->nullable(); // required if offline
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
