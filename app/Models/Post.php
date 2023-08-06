<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];

    protected $appends = [
        'owner',
    ];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function getOwnerAttribute()
    {
        return User::find($this->user_id)->name ?? null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
