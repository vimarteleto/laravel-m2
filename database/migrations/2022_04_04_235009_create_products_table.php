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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price', 10, 2);
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->timestamps();

            $table->foreign('discount_id')->references('id')->on('discounts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
