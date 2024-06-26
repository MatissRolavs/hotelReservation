<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{   
    protected $fillable = ['number', 'description', 'price', 'available'];
    use HasFactory;
}
