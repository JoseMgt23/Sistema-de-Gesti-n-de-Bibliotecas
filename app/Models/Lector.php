<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    use HasFactory;

    protected $table = 'lectores';
    protected $primaryKey = 'id_lectores';
    public $timestamps = false; // Cambia el nivel de acceso a public

    protected $fillable = [
        'nombre', 'apellido', 'direccion', 'telefono', 'email'
    ];

    public function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
}
