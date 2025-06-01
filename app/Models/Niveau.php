<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    protected $guarded = [];

     public function faxes()
    {
        return $this->hasMany(Faxe::class);
    }
}
