<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    public function getFirstMediaOrDefault(string $collectionName = 'default', array $filters = [])
    {
        info($filters);
        $media = $this->getFirstMedia($collectionName, $filters)?->getUrl();

        if (! $media) {
            return asset('images/oldcareimage.png');
        }

        return $media;
    }
}
