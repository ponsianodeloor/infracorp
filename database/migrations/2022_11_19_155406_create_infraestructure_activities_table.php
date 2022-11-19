<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('infraestructure_activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity');
            $table->decimal('reference_value', 10,2);
            $table->decimal('reference_value_inspection', 10, 2)->nullable();
            $table->unsignedBigInteger('infraestructure_type_id');

            $table->foreign('infraestructure_type_id')
                ->on('infraestructure_types')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('infraestructure_activities');
    }
};
