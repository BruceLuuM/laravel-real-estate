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
        Schema::create('module_functions', function (Blueprint $table) {
            $table->id();
            $table->string("function_name");
            $table->string("function_route");
            $table->string("function_folder");
            $table->string("function_file");
            $table->string("function_css")->nullable();
            $table->string("function_position")->nullable();
            $table->string("description");
            $table->tinyInteger("used");
            $table->tinyInteger("active");
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
        Schema::dropIfExists('module_functions');
    }
};
