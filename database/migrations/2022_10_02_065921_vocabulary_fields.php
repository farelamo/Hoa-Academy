<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vocabulary_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vocabulary_id')->constrained();
            $table->foreignId('vocabulary_category_id')->constrained();
            $table->string('word');
            $table->string('vocal');
            $table->string('mean');
            $table->text('sound');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vocabulary_fields');
    }
};
