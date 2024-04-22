<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libro = DB::table('tb_libro')
            ->join('tb_lector', 'tb_libro.id_lector', '=', 'tb_lector.id_lector')
            ->select('tb_libro.*', 'tb_lector.nombre')
            ->get();
        return view('libro.index', ['libros' => $libro]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libro = DB::table('tb_libro')
            ->orderBy('titulo')
            ->get();
        return view ('libro.new', ['libros' => $libro]);
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

        $libro = DB::table('tb_libro')
            ->join('tb_lector', 'tb_libro.id_lector', '=', 'tb_lector.id_lector')
            ->select('tb_libro.*', 'tb_lector.nombre')
            ->get();
        return view('libro.index', ['libros' => $libro]);

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
        $libro = DB::table ('tb_libro')
            ->orderBy('titulo')
            ->get();
        return view('libro_edit', ['libro' => $libro, 'lectores' => $lectores]);
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

        $libro = DB::table('tb_libro')
            ->join('tb_lector', 'tb_libro.id_lector', '=', 'tb_lector.id_lector')
            ->select('tb_libro.*', 'tb_lector.nombre')
            ->get();
        return view('libro.index', ['libros' => $libro]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libro::find($id);
        $libro->delete();

        $libro = DB::table('tb_libro')
            ->join('tb_lector', 'tb_libro.id_lector', '=', 'tb_lector.id_lector')
            ->select('tb_libro.*', 'tb_lector.nombre')
            ->get();
        return view('libro.index', ['libros' => $libro]);
    }
}
