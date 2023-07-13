<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grouup extends Model
{
    use HasFactory;
    public function Grouup(){
        return $this->belongsToMany(grouup::class);
    }
}
