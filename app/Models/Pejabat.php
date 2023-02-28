<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    public $table = 'pejabat';
    use HasFactory;

    protected $fillable = [
        'nama'
    ]; 
}
