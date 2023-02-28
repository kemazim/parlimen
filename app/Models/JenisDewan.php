<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDewan extends Model
{
     public $table = 'jenis_dewan';
    use HasFactory;

    protected $fillable = [
        'nama'
    ]; 
}
