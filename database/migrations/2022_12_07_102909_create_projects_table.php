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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invester_id')->constrained()->onDelete('cascade');
            $table->integer('category_id')->default('1');
            $table->integer('province_id')->default('1');
            $table->integer('district_id')->default('1');
            $table->integer('ward_id')->default('0');
            $table->string('name')->default('not have name yet');
            $table->integer('area')->default('0');
            $table->string('area_unit')->nullable();
            $table->longText('description')->default('not have description yet');
            $table->string('images')->nullable();
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
