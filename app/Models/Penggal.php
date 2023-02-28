<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggal extends Model
{
    public $table = 'penggal';
    use HasFactory;

    protected $fillable = [
        'nama'
    ];
}
 