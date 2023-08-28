<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pendapatan(){
        return $this->belongsTo(Pendapatan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
