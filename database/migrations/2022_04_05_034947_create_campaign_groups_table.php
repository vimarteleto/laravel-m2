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
        Schema::create('campaign_group', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->boolean('active')->default(0);

            $table->unique(['campaign_id', 'group_id']);

            $table->foreign('campaign_id')->references('id')->on('campaigns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_groups');
    }
};
