<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_image_path',
        'logo_text',
        'logo_text_highlight',
        'slogan',
        'site_title',
        'footer_description',
    ];

    /**
     * Retrieve the singleton site settings record.
     */
    public static function getSettings(): static
    {
        return static::firstOrCreate([], [
            'logo_text' => 'Esewa',
            'logo_text_highlight' => 'Punjab',
            'slogan' => 'Document assurance',
            'site_title' => 'EsewaPunjab | Secure document verification',
            'footer_description' => 'A clear, secure way to confirm the status of QR-linked immigration documents.',
        ]);
    }

    /**
     * Accessor for custom logo image URL.
     */
    public function getLogoImageUrlAttribute(): ?string
    {
        if ($this->logo_image_path && Storage::disk('public')->exists($this->logo_image_path)) {
            return Storage::url($this->logo_image_path);
        }

        return null;
    }
}
