<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('intervened_work_identifications', function (Blueprint $table) {
            $table->id();
            $table->string('identification');
            $table->string('work_number');
            $table->string('drive_type');
            $table->string('typology');
            $table->string('stage');
            $table->string('location');
            $table->string('province');
            $table->string('canton');
            $table->string('parish');
            $table->string('coordinate_x');
            $table->string('coordinate_y');
            $table->string('altitude');
            $table->string('existing_documentation');
            $table->string('land_deeds');
            $table->date('date_deeds');
            $table->string('municipality');
            $table->string('cadastral_code');
            $table->date('irm_date');
            $table->string('total_cos');
            $table->string('floors');
            $table->string('pb_cos');
            $table->string('front_removal');
            $table->string('block');
            $table->string('pst_removal');
            $table->string('side_removal');
            $table->date('delivery_date_property');
            $table->date('delivery_date_plans');

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
        Schema::dropIfExists('intervened_work_identifications');
    }
};
