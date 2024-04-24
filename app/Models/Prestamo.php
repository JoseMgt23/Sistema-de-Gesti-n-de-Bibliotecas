<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $table = 'prestamos';
    protected $primaryKey = 'id_prestamos';
    public $timestamps = false;

    protected $fillable = [
        'id_libros', 'id_lectores', 'fecha_prestamos', 'fecha_devolucion'
    ];

    public function libros(){
        return $this->belongsTo(Libro::class, 'id_libros');
    }

    public function lectores(){
        return $this->belongsTo(Lector::class, 'id_lectores');
    }
}
