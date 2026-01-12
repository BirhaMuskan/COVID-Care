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
        Schema::create('test_bookings', function (Blueprint $table) {
             $table->id('id');
            $table->string('test_type');
            $table->string('preferred_date');
            $table->string('time_slot');
            $table->string('sample_type');
            $table->string('symptoms')->nullable();
            $table->string('notes')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->enum('status', ['pending','approved','rejected','completed'])
          ->default('pending');
            $table->enum('result', ['positive','negative','inconclusive'])->nullable();
            $table->date('report_date')->nullable();
            $table->text('doctor_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_bookings');
    }
};
