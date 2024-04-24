<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Lector;
//use App\Models\Lector;

use Illuminate\Http\Request;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lectores = DB::table('lectores')
            ->join('libros', 'lectores.id_lectores', '=', 'libros.id_libros')
            ->select('lectores.*', 'libros.titulo')
            ->get();
        return view('lectores.index', ['lectores' => $lectores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lector = DB::table('lectores')
            ->orderBy('id_lectores')
            ->get();
        return view ('lectores.new', ['lectores' => $lector]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lector = new Lector();
        $lector->nombre = $request->nombre;
        $lector->apellido = $request->apellido;
        $lector->direccion = $request->direccion;
        $lector->telefono = $request->telefono;
        $lector->email = $request->email;

        $lector->save();

        $lectores = DB::table('lectores')
            ->join('libros', 'lectores.id_lectores', '=', 'libros.id_libros')
            ->select('lectores.*', 'libros.titulo')
            ->get();
        return view('lectores.index', ['lectores' => $lectores]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lector = Lector::find($id);
        $libros = DB::table ('libros')
            ->orderBy('nombre')
            ->get();
        return view('lectores_edit', ['lectores' => $lector, 'libros' => $libros]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lector = Lector::find($id);
        $lector->nombre = $request->nombre;
        $lector->apellido = $request->apellido;
        $lector->direccion = $request->direccion;
        $lector->telefono = $request->telefono;
        $lector->email = $request->email;

        $lector->save();

        $lector = DB::table('lectores')
            ->join('libros', 'lectores.id_lectores', '=', 'libros.id_libros')
            ->select('lectores.*', 'libros.titulo')
            ->get();
        return view('lectores.index', ['lectores' => $lector]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lector = Lector::find($id);
        $lector->delete();

        $lectores = DB::table('lectores')
            ->join('libros', 'lectores.id_lectores', '=', 'libros.id_libros')
            ->select('lectores.*', 'libros.titulo')
            ->get();
        return view('lectores.index', ['lectores' => $lectores]);
    }
}
