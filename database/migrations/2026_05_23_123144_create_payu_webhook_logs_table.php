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
        Schema::create('payu_webhook_logs', function (Blueprint $table) {
            $table->id();
            $table->string('txnid')->nullable();
            $table->string('mihpayid')->nullable();
            $table->string('status')->nullable();
            $table->string('event')->nullable();
            $table->json('payload')->nullable();
            $table->string('process_status')->default('received'); // received, processed, failed
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payu_webhook_logs');
    }
};
