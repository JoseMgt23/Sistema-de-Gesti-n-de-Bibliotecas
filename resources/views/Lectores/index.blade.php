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
        {{ __('Lectores') }}
    </h2>
</x-slot>
  </head>
  <body>
    <div class="container">   
    <h1>Listado de Lectores </h1>
    <a href="{{ route('lectores.create') }}"
    class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-2">Add</a>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">Code</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($lectores as $lector)
<tr>
    <th scope="row">{{ $lector->id_lectores }}</th>
    <td>{{ $lector->nombre }}</td>
    <td>{{ $lector->apellido }}</td>
    <td>{{ $lector->direccion }}</td>
    <td>{{ $lector->telefono }}</td>
    <td>{{ $lector->email }}</td>
    <td>
        <a href="{{ route('lectores.edit', ['lector' => $lector->id_lectores]) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Editar
        </a>
        <form action="{{ route('lectores.destroy', ['lector' => $lector->id_lectores]) }}" method="POST"
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