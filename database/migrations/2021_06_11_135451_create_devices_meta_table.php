<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_meta', function (Blueprint $table) {
            $table->id();
            $table->integer('device_id');
            $table->string('co2_offset')->nullable();
            $table->string('humidity_offset')->nullable();
            $table->string('temperature_offset')->nullable();
            $table->string('mac_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_meta');
    }
}
