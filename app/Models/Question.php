<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function parlimen()
    {
        return $this->belongsTo(Parlimen::class,'parlimen_id','id');
    }
    public function penggal()
    {
        return $this->belongsTo(Penggal::class,'penggal_id','id');
    }
    public function mesyuarat()
    {
        return $this->belongsTo(Mesyuarat::class,'mesyuarat_id','id');
    }
    public function sidang()
    {
        return $this->belongsTo(Sidang::class,'sidang_id','id');
    }

    public function jenisPertanyaan()
    {
        return $this->belongsTo(JenisPertanyaan::class,'jenis_pertanyaan_id','id');
    }

    public function jenisDewan()
    {
        return $this->belongsTo(JenisDewan::class,'jenis_dewan_id','id');
    }
    public function yangBerhormat()
    {
        return $this->belongsTo(YangBerhormat::class,'yang_berhormat_id','id');
    }

    public function getStatusStringAttribute()
    {
        switch ($this->status) {
            case 0:
                return "Soalan dan Jawapan untuk kelulusan";
                break;
            case 1:
                return "Soalan baru ditambah";
                break;
            case 2:
                return "Soalan dalam selian penyelaras";
                break;
            case 3:
                return "Soalan dan Jawapan lengkap";
                break;
            

        }
    }

    public $table = 'question';
    protected $fillable = [
        'rujukan',
        'tarikh',
        'jawapan',
    ];
   
} 
