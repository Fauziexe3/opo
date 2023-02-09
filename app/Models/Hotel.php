<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'hotels';
    protected $dates = ['crated_at'];
    protected $timestaps = false;
}
