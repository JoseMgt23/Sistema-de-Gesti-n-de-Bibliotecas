<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lector = DB::table('tb_lector')
            ->join('tb_libro', 'tb_lector.id_libro', '=', 'tb_libro.id_libro')
            ->select('tb_lector.*', 'tb_libro.titulo')
            ->get();
        return view('lector.index', ['lectores' => $lector]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lector = DB::table('tb_lector')
            ->orderBy('nombre')
            ->get();
        return view ('lector.new', ['lectores' => $lector]);
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

        $lector = DB::table('tb_lector')
        ->join('tb_libro', 'tb_lector.id_libro', '=', 'tb_libro.id_libro')
        ->select('tb_lector.*', 'tb_libro.titulo')
        ->get();
    return view('lector.index', ['lectores' => $lector]);       

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
        $libros = DB::table ('tb_libro')
            ->orderBy('nombre')
            ->get();
        return view('lector_edit', ['lector' => $lector, 'libros' => $libros]);
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

        $lector = DB::table('tb_lector')
        ->join('tb_libro', 'tb_lector.id_libro', '=', 'tb_libro.id_libro')
        ->select('tb_lector.*', 'tb_libro.titulo')
        ->get();

    return view('lector.index', ['lectores' => $lector]);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lector = Lector::find($id);
        $lector->delete();

        $lector = DB::table('tb_lector')
        ->join('tb_libro', 'tb_lector.id_libro', '=', 'tb_libro.id_libro')
        ->select('tb_lector.*', 'tb_libro.titulo')
        ->get();

    return view('lector.index', ['lectores' => $lector]);  
    }
}
