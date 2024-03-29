<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wijk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sintua(){
        return $this->hasOne(Sintua::class);
    }

    public function kk(){
        return $this->hasMany(Kk::class);
    }

    public function kegiatan(){
        return $this->hasMany(Kegiatan::class);
    }
}
