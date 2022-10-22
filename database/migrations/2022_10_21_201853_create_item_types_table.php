<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('item_types', function (Blueprint $table) {
            $table->id();

            $table->string('item_type');
            $table->unsignedBigInteger('volume_id');

            $table->foreign('volume_id')
                ->on('volumes')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_types');
    }
};
