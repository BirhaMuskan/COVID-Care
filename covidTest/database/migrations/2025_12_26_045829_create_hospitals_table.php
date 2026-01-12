<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');                 
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('services', ['covidTest','vaccination','both']);
            $table->string('phone', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('license_no');
            $table->string('city');
            $table->string('image');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
