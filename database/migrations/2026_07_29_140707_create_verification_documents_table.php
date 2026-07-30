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
        Schema::create('verification_documents', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('title'); // e.g., Marriage Certificate, Work Permit
            $table->string('applicant_name');
            $table->string('document_type'); // Marriage, Identity, Visa, etc.
            $table->string('file_path');
            $table->boolean('is_active')->default(true);
            $table->string('captcha_code')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_documents');
    }
};
