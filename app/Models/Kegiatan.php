<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kk(){
        return $this->belongsTo(Kk::class);
    }

    public function wijk(){
        return $this->belongsTo(Wijk::class);
    }

    public function sintua(){
        return $this->belongsTo(Sintua::class);
    }

    public function kehadiran(){
        return $this->hasOne(Kehadiran::class);
    }
}
