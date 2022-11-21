<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('executed_approved_mounts', function (Blueprint $table) {
            $table->id();

            $table->string('project')->nullable();
            $table->decimal('value_definitive_studies', 10, 2)->nullable();
            $table->decimal('value_approved_studies', 10, 2)->nullable();
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
        Schema::dropIfExists('executed_approved_mounts');
    }
};
