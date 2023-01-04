<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('brief');
            $table->longText('description');
            $table->integer('nums_project')->default('0');
            $table->string('invester_logo');
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
        Schema::dropIfExists('investers');
    }
};
