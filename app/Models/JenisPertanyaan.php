<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPertanyaan extends Model
{
    public $table = 'jenis_pertanyaan';
    use HasFactory;
    protected $fillable = [
        'nama'
    ]; 

}
