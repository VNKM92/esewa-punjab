<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'key',
        'name',
        'meta_title',
        'eyebrow',
        'hero_title',
        'hero_description',
        'body',
        'sections',
        'cta_label',
        'cta_url',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sections' => 'array',
        ];
    }
}
