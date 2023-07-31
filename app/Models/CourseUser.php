<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class CourseUser extends Model
{
    use HasFactory;
    protected $table = 'course_user';
}