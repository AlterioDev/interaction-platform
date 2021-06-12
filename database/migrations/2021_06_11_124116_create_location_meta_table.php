<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_meta', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id');
            $table->string('mist_org_id')->nullable();
            $table->string('mist_site_id')->nullable();
            $table->string('mist_map_id')->nullable();
            $table->integer('accuweather_location_key')->nullable();
            $table->integer('co2_notification_offset_low')->nullable();
            $table->integer('co2_notification_offset_high')->nullable();
            $table->integer('humidity_notification_offset')->nullable();
            $table->integer('capacity_notification_offset')->nullable();
            $table->string('floorplan_image')->nullable();
            $table->integer('floorplan_height')->nullable();
            $table->integer('floorplan_width')->nullable();
            $table->string('public_ssid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_meta');
    }
}
