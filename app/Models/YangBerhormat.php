<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YangBerhormat extends Model
{
    public $table = 'yang_berhormat';
    use HasFactory;

    protected $fillable = [
        'nama','yang_berhormat_id'
    ]; 
}
