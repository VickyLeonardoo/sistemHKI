<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function pendaftaran_sidi(){
        return $this->hasMany(PendaftaranSidi::class);
    }


}