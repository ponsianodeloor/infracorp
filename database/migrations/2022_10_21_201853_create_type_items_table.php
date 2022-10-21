<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('type_items', function (Blueprint $table) {
            $table->id();

            $table->string('type_item');
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
        Schema::dropIfExists('type_items');
    }
};
