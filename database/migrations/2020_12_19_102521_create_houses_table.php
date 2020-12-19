<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->boolean('method')->comment('0 租借 1 出售')->default(0);
            $table->text('building')->comment('幢/座');
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('lat', 10, 6)->comment('纬度');
            $table->decimal('lng', 10, 6)->comment('经度');
            $table->text('floor')->comment('楼层');
            $table->text('square_meter')->comment('面积');
            $table->integer('bedrooms')->comment('几室');
            $table->integer('livingrooms')->comment('几厅');
            $table->integer('bathrooms')->comment('几卫');
            $table->integer('balconines')->comment('几阳台');
            $table->text('sell_price')->comment('售价');
            $table->text('rent_price')->comment('租金');
            $table->boolean('status')->comment('状态');
            $table->text('note')->comment('备注');
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
        Schema::dropIfExists('houses');
    }
}
