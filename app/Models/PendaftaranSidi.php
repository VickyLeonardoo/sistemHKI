<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSidi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function status_pendaftaran(){
        return $this->belongsTo(StatusPendaftaran::class);
    }

    public function jemaat(){
        return $this->belongsTo(Jemaat::class);
    }
}
