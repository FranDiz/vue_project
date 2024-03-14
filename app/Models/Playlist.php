<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function canciones(){
        return $this->hasMany(Cancion::class);
    }
    use HasFactory;
}
