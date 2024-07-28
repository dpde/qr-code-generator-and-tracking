<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'qr_code',
    ];

    protected $casts = [
        'options' => 'array',
    ];    

    public static function boot()
    {
        parent::boot();

        static::saved(function ($targetPage) {
            $targetPage->qr_code = route('trackAndRedirect', ['targetPage' => $targetPage->id]);
            $targetPage->saveQuietly(); // Prevents infinite loop
        });
    }

    public function visitorTrackings()
    {
        return $this->hasMany(VisitorTracking::class);
    }
}