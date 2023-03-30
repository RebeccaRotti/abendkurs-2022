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
        Schema::create('story_relation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('story_id');
            $table->unsignedBigInteger('story_relation_id');
            $table->timestamps();

            $table->foreign('story_id')->references('id')->on('story')
                ->onDelete('cascade');
            $table->foreign('story_relation_id')->references('id')->on('story')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('story_relation');
    }
};
