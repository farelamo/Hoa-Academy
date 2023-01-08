<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('password')->nullable();
            $table->text('picture')->nullable();
            $table->enum('role', ['user', 'admin']);
            $table->integer('age')->length(3)->unsigned()->nullable();
            $table->enum('gender', ['man', 'woman'])->nullable();
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->string('profession')->nullable();
            $table->integer('mandarin_level')->length(2)->unsigned()->nullable();
            $table->double('poin', 10, 2)->default(0)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
