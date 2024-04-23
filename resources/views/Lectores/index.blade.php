<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Lectores</title>
  </head>
  <body>
    <div class="container">   
    <h1>Listado de Lectores </h1>
    <a href="{{router('lectores.create')}} " class="btn btn-success">Add</a>
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
      <th scope="row">{{$lector->id_lector}}</th>
        <td>{{$lector->nombre}}</td>
        <td>{{$lector->apellido}}</td>
        <td>{{$lector->direccion}}</td>
        <td>{{$lector->telefono}}</td>
        <td>{{$lector->email}}</td>
        <td>
            <a href="{{route('lectores.edit', ['lector'=>$lector->id_lector]) }}" 
            class="btn btn-info">Edit</a><li>

            <form action="{{ route('lectores.destroy', ['lector' -> $lector->id_lector])}}"
            method='POST' style="display: inline-block">
        @method('delete')
        @csrf
        <input class="btn btn-danger" type="submit" value="Delete">
        </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
  </body>
</html>