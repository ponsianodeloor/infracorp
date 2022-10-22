<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->integer('units')->nullable();
            $table->string('element_name')->nullable();
            $table->string('mc')->nullable();
            $table->integer('theta')->nullable();
            $table->string('type', 2)->nullable();
            $table->string('license_plate', 10)->nullable();
            $table->decimal('a', 10, 2)->nullable();
            $table->decimal('b', 10, 2)->nullable();
            $table->decimal('c', 10, 2)->nullable();
            $table->decimal('g', 10, 2)->nullable();
            $table->decimal('perimeter_m', 10, 2)->nullable();
            $table->decimal('area_m2', 10, 2)->nullable();
            $table->decimal('volume_m3', 10, 2)->nullable();
            $table->string('location')->nullable();
            $table->string('figure')->nullable();
            $table->string('codigo')->nullable();
            $table->integer('travels')->nullable();
            $table->decimal('referential_income', 10, 2)->nullable();
            $table->decimal('total_m3', 10, 2)->nullable();
            $table->string('section')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('weight_mass', 10, 2)->nullable();
            $table->decimal('length_m', 10, 2)->nullable();
            $table->decimal('weight_kg', 10, 2)->nullable();
            $table->decimal('num', 10, 2)->nullable();
            $table->decimal('part_length', 10, 2)->nullable();
            $table->decimal('total_length', 10, 2)->nullable();
            $table->text('observations')->nullable();
            $table->unsignedBigInteger('item_type_id');

            $table->foreign('item_type_id')
                ->on('item_types')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
