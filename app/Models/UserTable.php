<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'correo', 'telefono', 'contrasena',
    ];
    use HasFactory;
}
