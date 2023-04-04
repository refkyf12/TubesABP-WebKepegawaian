<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];
    
    public function cuti(){
        return $this->hasMany(Cuti::class);
    }

    public function lembur(){
        return $this->hasMany(Lembur::class);
    }

    public function departement(){
        return $this->hasMany(Departement::class);
    }
}
