<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_f_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('learning_user');
            $table->string('pdf')->nullable();
            $table->string('video')->nullable();
            $table->string('youtube_link')->nullable();
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
        Schema::dropIfExists('learning_f_a_s');
    }
};
