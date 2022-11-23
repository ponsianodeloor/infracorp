<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('economic_states', function (Blueprint $table) {
            $table->id();

            $table->string('concept')->nullable();
            $table->string('execution_period')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('advance_discount')->nullable();
            $table->string('liquid')->nullable();
            $table->string('economic_progress_percentage')->nullable();
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
        Schema::dropIfExists('economic_states');
    }
};
