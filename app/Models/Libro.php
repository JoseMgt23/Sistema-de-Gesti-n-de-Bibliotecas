<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'libros';
    protected $primaryKey = 'id_libros';
    public $timestamps = false;

    protected $fillable = [
        'titulo', 'autor', 'isbn','año_publicacion', 'editorial'
    ];

    public function Prestamos() {
        return $this->hasMany(Prestamo::class);
    }
}
