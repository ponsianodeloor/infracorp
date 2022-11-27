<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inspection_reports', function (Blueprint $table) {
            $table->id();
            $table->text('antecedent')->nullable();
            $table->text('audited_contract')->nullable();
            $table->text('resume_contract')->nullable();
            $table->text('geographic_location')->nullable();
            $table->string('geographic_location_url_img', 255)->nullable();
            $table->text('previous_temporary_control')->nullable();
            $table->text('contracted_control')->nullable();
            $table->string('resume_audited_contract', 255)->nullable();
            $table->text('project_documentation_review')->nullable();
            $table->text('warranty_review',)->nullable();
            $table->text('conclusions_recommendations')->nullable();
            $table->text('attention_pending_issues')->nullable();
            $table->text('annexes')->nullable();
            $table->text('signature')->nullable();
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
        Schema::dropIfExists('inspection_reports');
    }
};
