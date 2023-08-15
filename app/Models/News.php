<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_at',
        'end_at',
        'is_suspended',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
