<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_work_contractors', function (Blueprint $table) {
            $table->id();

            $table->integer('number')->nullable();
            $table->string('mdg')->nullable();
            $table->string('sub_circuit')->nullable();
            $table->string('typography')->nullable();
            $table->string('soil_study')->nullable();
            $table->string('environmental_certificate')->nullable();
            $table->string('typographical_revision')->nullable();
            $table->string('implantations')->nullable();
            $table->string('architectural_memories')->nullable();
            $table->string('structural')->nullable();
            $table->string('electrical_electronic')->nullable();
            $table->string('hydro_sanitary')->nullable();
            $table->string('mechanical_study')->nullable();

            $table->unsignedBigInteger('project_id');

            $table->foreign('project_id')
                ->on('projects')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_work_contractors');
    }
};
