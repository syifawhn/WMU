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
        Schema::create('detail_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_event');
            $table->foreign('id_event')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_property');
            $table->foreign('id_property')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_team');
            $table->foreign('id_team')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detail_events');
    }
};
