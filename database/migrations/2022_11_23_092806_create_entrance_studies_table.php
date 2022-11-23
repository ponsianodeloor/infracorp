<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('entrance_studies', function (Blueprint $table) {
            $table->id();

            $table->string('entry')->nullable();
            $table->string('return')->nullable();
            $table->string('re_entry')->nullable();
            $table->string('backup_document')->nullable();
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
        Schema::dropIfExists('entrance_studies');
    }
};
