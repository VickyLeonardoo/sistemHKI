<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sintua extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wijk(){
        return $this->belongsTo(Wijk::class);
    }

    public function kegiatan(){
        return $this->hasMany(Kegiatan::class);
    }

}
