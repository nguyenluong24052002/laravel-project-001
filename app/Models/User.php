<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const GENDER = [
        'male' => 1,
        'famale' => 2,
    ];

    const TYPE = [
        'admin' => 1,
        'normal' => 2,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'gender',
        'address',
        'type',
        'avatar',
        'created_at',
        'update_at',
        'delete_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(course::class);
    }

    
    public function getUserTypeAttribute()
    {
        if ($this->attributes['type'] == static::TYPE['admin']) {
            return 'Administrator';
        }

        return 'Usser';
    }

    public function getGenderLabelAttribute()
    {
        if ($this->attributes['gender'] == static::GENDER['male']) {
            return 'Male';
        }
        if ($this->attributes['gender'] == static::GENDER['famale']) {
            return 'Famale';
        }

        return null;
    }

}
