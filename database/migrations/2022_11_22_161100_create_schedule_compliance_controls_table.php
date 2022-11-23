<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schedule_compliance_controls', function (Blueprint $table) {
            $table->id();

            $table->string('month')->nullable();
            $table->string('calendar')->nullable();
            $table->string('cumulative_scheduled')->nullable();
            $table->string('executed_scheduled')->nullable();
            $table->string('compliance_percentage')->nullable();
            $table->string('difference_in_arrears')->nullable();

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
        Schema::dropIfExists('schedule_compliance_controls');
    }
};
