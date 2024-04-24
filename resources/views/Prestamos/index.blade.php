<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Préstamos') }}
    </h2>
</x-slot>
    <title>Listado de Libros</title>
</head>
<body>
    <div class="container">   
        <h1>Listado de Préstamos</h1>
        <a href="{{ route('prestamos.create') }}"
            class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-2">Agregar</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libro</th>
                    <th scope="col">Lector</th>
                    <th scope="col">Fecha de Préstamo</th>
                    <th scope="col">Fecha de Devolución</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($prestamos as $prestamo)
<tr>
    <th scope="row">{{ $prestamo->id_prestamos }}</th>
    <td>{{ $prestamo->libro }}</td>
    <td>{{ $prestamo->lector }}</td>
    <td>{{ $prestamo->fecha_prestamo }}</td>
    <td>{{ $prestamo->fecha_devolucion }}</td>
    <td>
        <a href="{{ route('prestamos.edit', ['prestamo' => $prestamo->id_prestamos]) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Editar
        </a>
        <form action="{{ route('prestamos.destroy', ['prestamo' => $prestamo->id_prestamos]) }}" method="POST"
            style="display: inline-block">
            @method('delete')
            @csrf
            <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2"
                value="Eliminar">
        </form>
    </td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
    </x-app-layout>
</body>
</html>