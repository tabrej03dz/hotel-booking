<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('room_type_id')->constrained('room_types')->onDelete('cascade');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed', 'failed'])->default('pending');
            $table->integer('staying_days')->default(0);
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('additional_service_charge', 10, 2)->nullable();
            $table->decimal('tax_and_fee', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->integer('adults')->default(1);
            $table->integer('children')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
