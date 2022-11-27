<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inspection_activities', function (Blueprint $table) {
            $table->id();

            $table->string('specialty', 255);
            $table->string('date', 255);
            $table->string('act_number', 255);
            $table->string('affair', 255);
            $table->string('revised_property', 255);
            $table->string('revision_number', 255);
            $table->unsignedBigInteger('project_id');

            $table->foreign('project_id')
                ->on('projects')
                ->references('id')
                ->onUpdate('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inspection_activities');
    }
};
