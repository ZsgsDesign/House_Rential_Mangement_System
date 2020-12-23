<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteAtToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->softDeletes('deleted_at', 0);
        });
        Schema::table('areas', function (Blueprint $table) {
            $table->softDeletes('deleted_at', 0);
        });
        Schema::table('properties', function (Blueprint $table) {
            $table->softDeletes('deleted_at', 0);
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
            $table->dropSoftDeletes();
        });
        Schema::table('areas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('properties', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
