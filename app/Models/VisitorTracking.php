<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorTracking extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'user_agent', 'referer', 'target_page_id'];

    public function targetPage()
    {
        return $this->belongsTo(TargetPage::class);
    }
}