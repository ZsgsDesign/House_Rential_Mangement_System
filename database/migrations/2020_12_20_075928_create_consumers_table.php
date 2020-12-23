<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100)->comment('名');
            $table->string('last_name', 100)->comment('姓');
            $table->boolean('gender')->comment('性别 0 男 1 女');
            $table->string('email')->comment('电子邮件')->nullable();
            $table->string('tel')->comment('手机')->nullable();
            $table->text('note')->comment('备注')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
}
