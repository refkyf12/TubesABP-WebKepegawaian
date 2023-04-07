<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = 'cuti';

    protected $fillable = [
        'users_id',
        'lama_cuti',
        'tanggal_cuti',
        'disetujui',
    ];

    public function users(){
        return $this->belongsTo(Users::class);
    }
}
