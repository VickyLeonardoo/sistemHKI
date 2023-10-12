<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pengeluaran(){
        return $this->belongsTo(Pengeluaran::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
