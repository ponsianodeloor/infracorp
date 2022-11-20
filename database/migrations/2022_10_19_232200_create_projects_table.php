<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->text('project');
            $table->string('contractor');
            $table->string('inspection');
            $table->string('place');
            $table->string('url_image_location')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->double('reference_value_contract')->nullable();
            $table->string('date_start_text', 255)->nullable();
            $table->string('advance_payment_date_text')->nullable();
            $table->string('project_term_start_date_text')->nullable();
            $table->integer('contract_term')->nullable();
            $table->integer('term_extensions')->nullable();
            $table->string('contract_termination_date_text')->nullable();
            $table->integer('advance')->nullable();
            $table->enum('price_adjustments', ['SI', 'NO'])->default('NO');
            $table->text('readjustment_formula')->nullable();
            $table->text('way_to_pay')->nullable();
            $table->double('total_current_amount')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
