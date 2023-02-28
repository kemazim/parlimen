<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidang extends Model 
{
    public $table = 'sidang';
    use HasFactory;

    protected $fillable = [
        'nama'
    ];
}
 