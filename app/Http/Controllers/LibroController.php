<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libro = DB::table('libros')
            ->join('lectores', 'libros.id_libros', '=', 'lectores.id_lectores')
            ->select('libros.*', 'lectores.nombre')
            ->get();
        return view('libros.index', ['libros' => $libro]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libro = DB::table('libros')
            ->orderBy('titulo')
            ->get();
        return view ('libros.new', ['libros' => $libro]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->isbn = $request->isbn;
        $libro->año_publicacion = $request->año_publicacion;
        $libro->editorial = $request->editorial;

        $libro->save();

        $libro = DB::table('libros')
        ->join('lectores', 'libros.id_libros', '=', 'lectores.id_lectores')
        ->select('libros.*', 'lectores.nombre')
        ->get();
    return view('libros.index', ['libros' => $libro]);

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
        $libro = Libro::find($id);
        $libro = DB::table ('libros')
            ->orderBy('titulo')
            ->get();
        return view('libros_edit', ['libros' => $libro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = Libro::find($id);
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->isbn = $request->isbn;
        $libro->año_publicacion = $request->año_publicacion;
        $libro->editorial = $request->editorial;

        $libro->save();

        $libro = DB::table('libros')
            ->join('lectores', 'libros.id_libros', '=', 'lectores.id_lectores')
            ->select('libros.*', 'lectores.nombre')
            ->get();
        return view('libros.index', ['libros' => $libro]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libro::find($id);
        $libro->delete();

        $libro = DB::table('libros')
            ->join('lectores', 'libros.id_libros', '=', 'lectores.id_lectores')
            ->select('libros.*', 'lectores.nombre')
            ->get();
        return view('libros.index', ['libros' => $libro]);
    }
}
