<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kk(){
        return $this->belongsTo(Kk::class);
    }
}
