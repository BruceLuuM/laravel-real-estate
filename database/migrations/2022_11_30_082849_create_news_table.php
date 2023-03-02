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
            $table->integer('category_id')->unsigned()->default('1');
            $table->integer('ward_id')->unsigned()->default('1');
            $table->integer('district_id')->unsigned()->default('1');
            $table->integer('province_id')->unsigned()->default('1');
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('area_unit')->nullable();
            $table->string('price')->nullable();;
            $table->string('price_unit')->nullable();
            $table->string('news_header')->default('not have news header yet');
            $table->string('slug')->default('not have slug yet');
            $table->longText('description')->default('not have description yet');
            $table->string('attribute')->nullable();
            $table->string('num_bed_rooms')->nullable();
            $table->string('num_wc_rooms')->nullable();
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
