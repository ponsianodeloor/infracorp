<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('execution_status_types', function (Blueprint $table) {
            $table->id();

            $table->string('type_and_description');
            $table->unsignedBigInteger('execution_status_id');

            $table->foreign('execution_status_id')
                ->on('execution_statuses')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('execution_status_types');
    }
};
