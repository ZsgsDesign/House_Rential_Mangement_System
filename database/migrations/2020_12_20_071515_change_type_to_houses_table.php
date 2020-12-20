<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeToHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->decimal('sell_price',12,2)->comment('售价（人民币元）')->change();
            $table->decimal('rent_price',12,2)->comment('租金（人民币元）')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->bigInteger('sell_price')->comment('售价（人民币分）')->change();
            $table->bigInteger('rent_price')->comment('租金（人民币分）')->change();
        });
    }
}
