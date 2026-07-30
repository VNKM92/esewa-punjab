<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_image_path')->nullable();
            $table->string('logo_text')->default('Esewa');
            $table->string('logo_text_highlight')->default('Punjab');
            $table->string('slogan')->default('Document assurance');
            $table->string('site_title')->default('EsewaPunjab | Secure document verification');
            $table->text('footer_description')->nullable();
            $table->timestamps();
        });

        // Insert initial default setting record
        DB::table('site_settings')->insert([
            'logo_text' => 'Esewa',
            'logo_text_highlight' => 'Punjab',
            'slogan' => 'Document assurance',
            'site_title' => 'EsewaPunjab | Secure document verification',
            'footer_description' => 'A clear, secure way to confirm the status of QR-linked immigration documents.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
