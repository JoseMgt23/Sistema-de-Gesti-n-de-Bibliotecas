<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $table = 'tb_prestamo';
    protected $primaryKey = 'id_prestamo';
    public $timestamps = false;

    protected $fillable = [
        'id_libro', 'id_lector', 'fecha_prestamo', 'fecha_devolucion'
    ];

    public function libros(){
        return $this->belongsTo(Libro::class, 'id_libro');
    }

    public function lectores(){
        return $this->belongsTo(Lector::class, 'id_lector');
    }
}
