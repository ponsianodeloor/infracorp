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
            $table->string('identification')->nullable();
            $table->string('work_number')->nullable();
            $table->string('drive_type')->nullable();
            $table->string('typology')->nullable();
            $table->string('stage')->nullable();
            $table->string('location')->nullable();
            $table->string('province')->nullable();
            $table->string('canton')->nullable();
            $table->string('parish')->nullable();
            $table->string('coordinate_x')->nullable();
            $table->string('coordinate_y')->nullable();
            $table->string('altitude')->nullable();
            $table->string('existing_documentation')->nullable();
            $table->string('land_deeds')->nullable();
            $table->date('date_deeds')->nullable();
            $table->string('municipality')->nullable();
            $table->string('cadastral_code')->nullable();
            $table->date('irm_date')->nullable();
            $table->string('total_cos')->nullable();
            $table->string('floors')->nullable();
            $table->string('pb_cos')->nullable();
            $table->string('front_removal')->nullable();
            $table->string('block')->nullable();
            $table->string('pst_removal')->nullable();
            $table->string('side_removal')->nullable();
            $table->date('delivery_date_property')->nullable();
            $table->date('delivery_date_plans')->nullable();

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
