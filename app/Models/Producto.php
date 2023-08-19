<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'marca_empresa_id', 'user_id', 'imagen', 'titulo', 'precio'];

    public function marcaEmpresa()
    {
        return $this->belongsTo(MarcaEmpresa::class, 'marca_empresa_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
