<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    use HasFactory;
    protected $table = 'tb_lector';
    protected $primaryKey = 'id_lector';
    protected $timestamps = false;

    protected $fillable = [
        'nombre', 'apellido', 'direccion', 'telefono', 'email'
    ];

    public function lectores(){
        return $this->hasMany(Prestamo::class);
    }
}
