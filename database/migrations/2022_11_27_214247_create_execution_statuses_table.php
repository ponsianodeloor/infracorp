<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('execution_statuses', function (Blueprint $table) {
            $table->id();

            $table->string('stage');
            $table->date('start_date');
            $table->date('final_date');
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
        Schema::dropIfExists('execution_statuses');
    }
};
