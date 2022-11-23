<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contractor_workers', function (Blueprint $table) {
            $table->id();

            $table->string('position')->nullable();
            $table->integer('amount')->nullable();
            $table->string('name')->nullable();
            $table->string('observations')->nullable();
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
        Schema::dropIfExists('contractor_workers');
    }
};
