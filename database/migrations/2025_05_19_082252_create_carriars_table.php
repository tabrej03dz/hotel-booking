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
        Schema::create('carriars', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // To store uploaded image path

            $table->string('title');                   // Job title
            $table->text('description');               // Full job description
            $table->string('company_name');            // Name of the company
            $table->string('location');                // Job location
            $table->string('type')->default('Full-Time'); // Job type: Full-Time, Part-Time, Remote
            $table->decimal('salary', 10, 2)->nullable(); // Optional salary
            $table->string('experience')->nullable();  // Required experience (e.g., "2+ years")
            $table->string('qualification')->nullable(); // Required qualification
            $table->string('contact_email');           // Contact email for applications
            $table->date('last_date_to_apply')->nullable(); // Deadline to apply
            $table->boolean('is_active')->default(true);   // Job status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carriars');
    }
};
