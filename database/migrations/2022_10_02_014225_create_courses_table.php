<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('image')->nullable();
            $table->text('short_desc');
            $table->text('desc');
            $table->enum('type', ['regular', 'business']); // regular = 1, business = 2
            $table->enum('hsk_type', [1,2,3,4,5,6]);
            // elementary = 1, intermediate = 2, advance = 3
            $table->enum('business_type', ['elementary', 'intermediate', 'advance'])->nullable(); 
            $table->integer('level')->unsigned();
            $table->integer('meet_times')->default(16);
            $table->integer('duration')->unsigned();
            $table->integer('price')->unsigned();
            $table->text('group_link');
            $table->text('meet_link');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
