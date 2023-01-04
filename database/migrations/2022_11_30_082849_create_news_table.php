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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('category_id')->unsigned()->default('0');
            $table->integer('ward_id')->unsigned()->default('0');
            $table->integer('district_id')->unsigned()->default('0');
            $table->integer('province_id')->unsigned()->default('0');
            $table->string('address')->default('not have address yet');
            $table->string('area')->default('0');
            $table->string('area_unit')->default('0');
            $table->string('price')->default('0');;
            $table->string('price_unit')->default('0');
            $table->string('news_header')->default('not have news header yet');;
            $table->string('slug')->default('not have slug yet');;
            $table->longText('description')->default('not have description yet');
            $table->string('attribute')->default('0');
            $table->string('num_bed_rooms')->default('0');
            $table->string('num_wc_rooms')->default('0');
            $table->mediumText('law_related_info')->nullable()->default('no law realated yet');
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
        Schema::dropIfExists('news');
    }
};
