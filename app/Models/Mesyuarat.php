<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesyuarat extends Model
{
    public $table = 'mesyuarat';
    use HasFactory;

    protected $fillable = [
        'nama'
    ];
}

