<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nombre', 'proveedor_id'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
