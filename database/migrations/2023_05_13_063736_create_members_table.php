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
    Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('membership_id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone_number');
        $table->string('address');
        $table->date('date_of_birth');
        $table->string('gender', 10);
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('membership_id')->references('id')->on('memberships');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
