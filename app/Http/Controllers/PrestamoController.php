<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = DB::table('prestamos')
                    ->join('lectores', 'prestamos.id_prestamos', '=', 'lectores.id_lectores')
                    ->join('libros', 'prestamos.id_prestamos', '=', 'libros.id_libros')
                    ->select('prestamos.*', 'lectores.nombre', 'libros.titulo')
                    ->get();
        
        return view('prestamos.index', ['prestamos' => $prestamos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libros = DB::table('libros')
            ->orderBy('titulo')
            ->get();
        $lectores = DB::table('lectores')
            ->orderBy('nombre')
            ->get();
            
        return view ('prestamos.new', ['libros' => $libros, 'lectores' => $lectores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prestamos = new Prestamo();
        $prestamos->libro_id = $request->libro_id;
        $prestamos->lector_id = $request->lector_id;
        $prestamos->fecha_préstamo = $request->fecha_préstamo;
        $prestamos->fecha_devolución = $request->fecha_devolución;

        $prestamos->save();

        $prestamos = DB::table('prestamos')
                    ->join('lectores', 'prestamos.id_prestamos', '=', 'lectores.id_lectores')
                    ->join('libros', 'prestamos.id_prestamos', '=', 'libros.id_libros')
                    ->select('prestamos.*', 'lector.nombre', 'libros.titulo')
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
        $prestamos = Prestamo::find($id);
        $lectores = DB::table ('lectores')
            ->orderBy('titulo')
            ->get();
        $libros = BD::table('libros')
            ->orderBy('nombre')
            ->get();
        return view('libros_edit', ['libros' => $libros, 'lectores' => $lectores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prestamos = Prestamo::find($id);
        $prestamos->libro_id = $request->libro_id;
        $prestamos->lector_id = $request->lector_id;
        $prestamos->fecha_préstamo = $request->fecha_préstamo;
        $prestamos->fecha_devolución = $request->fecha_devolución;

        $prestamos->save();

        $prestamos = DB::table('prestamos')
                    ->join('lectores', 'prestamos.id_prestamos', '=', 'lectores.id_lectores')
                    ->join('libros', 'prestamos.id_prestamos', '=', 'libros.id_libros')
                    ->select('prestamos.*', 'lector.nombre', 'libros.titulo')
                    ->get();
        
        return view('prestamos.index', ['prestamos' => $prestamos]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestamos = Prestamo::find($id);
        $prestamos->delete();

        $prestamos = DB::table('prestamos')
                    ->join('lectores', 'prestamos.id_prestamos', '=', 'lectores.id_lectores')
                    ->join('libros', 'prestamos.id_prestamos', '=', 'libros.id_libros')
                    ->select('prestamos.*', 'lector.nombre', 'libros.titulo')
                    ->get();
        
        return view('prestamos.index', ['prestamos' => $prestamos]);
    }
}
