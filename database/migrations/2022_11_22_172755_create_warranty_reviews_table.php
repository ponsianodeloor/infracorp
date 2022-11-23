<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('warranty_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('type_guarantee')->nullable();
            $table->string('issuing_entity')->nullable();
            $table->string('number')->nullable();
            $table->string('reference')->nullable();
            $table->string('amount')->nullable();
            $table->string('valid_since')->nullable();
            $table->string('valid_until')->nullable();
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
        Schema::dropIfExists('warranty_reviews');
    }
};
