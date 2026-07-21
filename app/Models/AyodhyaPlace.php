<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AyodhyaPlace extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

protected function imageUrl(): Attribute
{
    return Attribute::get(function () {
        $image = trim((string) $this->image);

        if ($image === '') {
            return asset('asset/images/no-image.png');
        }

        /*
         * External image URL
         */
        if (
            str_starts_with($image, 'http://') ||
            str_starts_with($image, 'https://')
        ) {
            return $image;
        }

        /*
         * Already complete storage path
         */
        if (str_starts_with($image, '/storage/')) {
            return url($image);
        }

        if (str_starts_with($image, 'storage/')) {
            return asset($image);
        }

        /*
         * Seeder/public folder image
         *
         * asset/images/ayodhya/image.jpg
         * images/ayodhya/image.jpg
         */
        if (
            str_starts_with($image, 'asset/') ||
            str_starts_with($image, 'images/')
        ) {
            return asset($image);
        }

        /*
         * Seeder path saved with public/
         */
        if (str_starts_with($image, 'public/')) {
            return asset(substr($image, 7));
        }

        /*
         * Uploaded image relative path
         *
         * ayodhya-places/image.jpg
         */
        return asset('storage/' . ltrim($image, '/'));
    });
}
}