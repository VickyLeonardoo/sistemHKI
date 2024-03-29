<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wijk(){
        return $this->belongsTo(Wijk::class);
    }

    public function jemaat(){
        return $this->hasMany(Jemaat::class);
    }

    public function kegiatan(){
        return $this->hasMany(Kegiatan::class);
    }
}
