<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poducto extends Model
{
    protected $fillable = ['nombre', 'marca_id', 'user_id', 'imagen', 'titulo', 'precio'];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
