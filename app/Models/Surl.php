<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surl extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['url'];
}
