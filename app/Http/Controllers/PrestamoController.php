<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = DB::table('tb_prestamos')
                    ->join('tb_lector', 'tb_prestamos.lector_id', '=', 'tb_lector.id')
                    ->join('tb_libros', 'tb_prestamos.libro_id', '=', 'tb_libros.id')
                    ->select('tb_prestamos.*', 'tb_lector.nombre', 'tb_libros.titulo')
                    ->get();
        
        return view('prestamo.index', ['prestamos' => $prestamos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libros = DB::table('tb_libros')
            ->orderBy('titulo')
            ->get();
        $lectores = DB::table('tb_lector')
            ->orderBy('nombre')
            ->get();
            
        return view ('prestamo.new', ['libros' => $libros, 'lectores' => $lectores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prestamo = new Prestamo();
        $prestamo->libro_id = $request->libro_id;
        $prestamo->lector_id = $request->lector_id;
        $prestamo->fecha_préstamo = $request->fecha_préstamo;
        $prestamo->fecha_devolución = $request->fecha_devolución;

        $prestamo->save();

        $prestamos = DB::table('tb_prestamos')
                    ->join('tb_lector', 'tb_prestamos.lector_id', '=', 'tb_lector.id')
                    ->join('tb_libros', 'tb_prestamos.libro_id', '=', 'tb_libros.id')
                    ->select('tb_prestamos.*', 'tb_lector.nombre', 'tb_libros.titulo')
                    ->get();
        
        return view('prestamo.index', ['prestamos' => $prestamos]);

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
        $prestamo = Prestamo::find($id);
        $lector = DB::table ('tb_lector')
            ->orderBy('titulo')
            ->get();
        $libro = BD::table('tb_libro')
            ->orderBy('nombre')
            ->get();
        return view('libro_edit', ['libro' => $libro, 'lectores' => $lectoress]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prestamo = Prestamo::find($id);
        $prestamo->libro_id = $request->libro_id;
        $prestamo->lector_id = $request->lector_id;
        $prestamo->fecha_préstamo = $request->fecha_préstamo;
        $prestamo->fecha_devolución = $request->fecha_devolución;

        $prestamo->save();

        $prestamos = DB::table('tb_prestamos')
        ->join('tb_lector', 'tb_prestamos.lector_id', '=', 'tb_lector.id')
        ->join('tb_libros', 'tb_prestamos.libro_id', '=', 'tb_libros.id')
        ->select('tb_prestamos.*', 'tb_lector.nombre', 'tb_libros.titulo')
        ->get();

        return view('prestamo.index', ['prestamos' => $prestamos]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestamo = Prestamo::find($id);
        $prestamo->delete();

        $prestamos = DB::table('tb_prestamos')
        ->join('tb_lector', 'tb_prestamos.lector_id', '=', 'tb_lector.id')
        ->join('tb_libros', 'tb_prestamos.libro_id', '=', 'tb_libros.id')
        ->select('tb_prestamos.*', 'tb_lector.nombre', 'tb_libros.titulo')
        ->get();

        return view('prestamo.index', ['prestamos' => $prestamos]);
    }
}
