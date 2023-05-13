<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourlyRatesTable extends Migration
{
    public function up()
    {
        Schema::create('hourly_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membership_id');
            $table->unsignedBigInteger('vehicle_type_id');
            $table->decimal('value', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('membership_id')->references('id')->on('memberships');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hourly_rates');
    }
}