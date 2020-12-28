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
            $table->string('building',50)->comment('幢/座');
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade')->onUpdate('cascade');
            $table->string('floor',50)->comment('楼层');
            $table->decimal('square_meter',10,4)->comment('面积（平方米）');
            $table->integer('bedrooms')->comment('几室');
            $table->integer('livingrooms')->comment('几厅');
            $table->integer('bathrooms')->comment('几卫');
            $table->integer('balconines')->comment('几阳台');
            $table->bigInteger('sell_price')->comment('售价（人民币分）')->nullable();
            $table->bigInteger('rent_price')->comment('租金（人民币分）')->nullable();
            $table->boolean('status')->comment('状态')->nullable();
            $table->text('note')->comment('备注')->nullable();
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
