<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('parking_data', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('hourly_rates_id');
            $table->dateTime('datetime_in');
            $table->dateTime('datetime_out');
            $table->decimal('amount_to_pay', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('hourly_rates_id')->references('id')->on('hourly_rates');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_data');
    }
};
