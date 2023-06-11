<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;
    protected $table = 'lembur';

    protected $fillable = [
        'users_id',
        'lama_lembur',
        'tanggal_lembur',
        'disetujui',
    ];

    public function users(){
        return $this->belongsTo(Users::class);
    }
}
