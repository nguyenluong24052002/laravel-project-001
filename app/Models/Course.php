<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'link',
        'price',
        'old_price',
        'created_by',
        'category_id',
        'lessons',
        'view_count',
        'benefits',
        'fqa',
        'is_feature',
        'is_online',
        'description',
        'content',
        'meta_title',
        'meta_desc',
        'meta_keyword',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
