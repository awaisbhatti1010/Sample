<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['Name', 'Email', 'Roll_Number', 'image', 'img_path'];
}
