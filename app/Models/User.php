<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */

    protected $fillable = [
        'nomborKadPengenalan',
        'nama',
        'email',
        'nomborTelefonBimbit',
        'peranan',
        'password',
        'gred_id',
        'pejabat_id',
        'noTelPej',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getPerananStringAttribute()
    {
    switch ($this->peranan) { 
            case 1:
            return "Pengguna";
            break;
            case 2:
            return "Penyelaras";
            break;
            case 3:
            return "Pentadbir";
            break;
    }
}

    public function getStatusStringAttribute()
    {
        switch ($this->status) {
            case 0:
                return "Tidak aktif";
                break;
            case 1:
                return "Aktif";
                break;
            case 2:
                return "Permohonan ditolak";
                break;

        }
    }
    public function gred()
    {
        return $this->belongsTo(Gred::class,'gred_id','id');
    }
    public function pejabat()
    {
        return $this->belongsTo(Pejabat::class,'pejabat_id','id');
    }
}