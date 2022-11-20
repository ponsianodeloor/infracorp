<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inspection_contracts', function (Blueprint $table) {
            $table->id();

            $table->text('project_inspection')->nullable();
            $table->string('place')->nullable();
            $table->string('contractor')->nullable();
            $table->double('reference_value_contract')->nullable();
            $table->string('date_start_text', 255)->nullable();
            $table->string('project_term_start_date_text')->nullable();
            $table->integer('contract_term')->nullable();
            $table->integer('term_extensions')->nullable();
            $table->string('contract_termination_date_text')->nullable();
            $table->integer('advance')->nullable();
            $table->enum('price_adjustments', ['SI', 'NO'])->default('NO');
            $table->text('readjustment_formula')->nullable();
            $table->text('way_to_pay')->nullable();
            $table->double('total_current_amount')->nullable();
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
        Schema::dropIfExists('inspection_contracts');
    }
};
