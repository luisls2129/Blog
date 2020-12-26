<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'contenido'];

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
}
