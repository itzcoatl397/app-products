<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'direccion', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function marcasEmpresas()
    {
        return $this->hasMany(MarcaEmpresa::class, 'proveedor_id');
    }
}
