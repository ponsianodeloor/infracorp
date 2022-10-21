<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('volumes', function (Blueprint $table) {

            $table->text('description')->after('item')->nullable();
            $table->enum('units', ['on', 'off'])->default('off');
            $table->enum('element_name', ['on', 'off'])->default('off');
            $table->enum('mc', ['on', 'off'])->default('off');
            $table->enum('theta', ['on', 'off'])->default('off');
            $table->enum('type', ['on', 'off'])->default('off');
            $table->enum('a', ['on', 'off'])->default('off');
            $table->enum('b', ['on', 'off'])->default('off');
            $table->enum('c', ['on', 'off'])->default('off');
            $table->enum('g', ['on', 'off'])->default('off');
            $table->enum('perimeter_m', ['on', 'off'])->default('off');
            $table->enum('area_m2', ['on', 'off'])->default('off');
            $table->enum('volume_m3', ['on', 'off'])->default('off');
            $table->enum('location', ['on', 'off'])->default('off');
            $table->enum('figure', ['on', 'off'])->default('off');
            $table->enum('codigo', ['on', 'off'])->default('off');
            $table->enum('travels', ['on', 'off'])->default('off');
            $table->enum('referential_income', ['on', 'off'])->default('off');
            $table->enum('total_m3', ['on', 'off'])->default('off');
            $table->enum('section', ['on', 'off'])->default('off');
            $table->enum('amount', ['on', 'off'])->default('off');
            $table->enum('weight_mass', ['on', 'off'])->default('off');
            $table->enum('length_m', ['on', 'off'])->default('off');
            $table->enum('weight_kg', ['on', 'off'])->default('off');
            $table->enum('num', ['on', 'off'])->default('off');
            $table->enum('part_length', ['on', 'off'])->default('off');
            $table->enum('total_length', ['on', 'off'])->default('off');
            $table->enum('observations', ['on', 'off'])->default('off');

        });
    }

    public function down()
    {
        Schema::table('volumes', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('units');
            $table->dropColumn('element_name');
            $table->dropColumn('mc');
            $table->dropColumn('theta');
            $table->dropColumn('type');
            $table->dropColumn('a');
            $table->dropColumn('b');
            $table->dropColumn('c');
            $table->dropColumn('g');
            $table->dropColumn('perimeter_m');
            $table->dropColumn('area_m2');
            $table->dropColumn('volume_m3');
            $table->dropColumn('location');
            $table->dropColumn('figure');
            $table->dropColumn('codigo');
            $table->dropColumn('travels');
            $table->dropColumn('referential_income');
            $table->dropColumn('total_m3');
            $table->dropColumn('section');
            $table->dropColumn('amount');
            $table->dropColumn('weight_mass');
            $table->dropColumn('length_m');
            $table->dropColumn('weight_kg');
            $table->dropColumn('num');
            $table->dropColumn('part_length');
            $table->dropColumn('total_length');
            $table->dropColumn('observations');
        });
    }
};
