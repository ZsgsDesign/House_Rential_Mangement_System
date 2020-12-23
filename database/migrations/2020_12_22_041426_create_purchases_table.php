<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consumer_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('house_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('started_at', 0)->nullable();
            $table->timestamp('ended_at', 0)->nullable();
            $table->boolean('sell_type')->comment('0 租借 1 出售');
            $table->decimal('price',12,2)->comment('售价');
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
        Schema::dropIfExists('purchases');
    }
}
