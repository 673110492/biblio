<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
