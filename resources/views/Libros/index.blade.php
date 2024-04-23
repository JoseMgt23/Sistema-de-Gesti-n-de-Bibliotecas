<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Libros</title>
</head>
<body>
    <div class="container">   
        <h1>Listado de Libros</h1>
        <a href="{{route('libros.create')}}" class="btn btn-success">Añadir</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Género</th>
                    <th scope="col">Año de Publicación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                <tr>
                    <th scope="row">{{$libro->id_libro}}</th>
                    <td>{{$libro->titulo}}</td>
                    <td>{{$libro->autor}}</td>
                    <td>{{$libro->genero}}</td>
                    <td>{{$libro->ano_publicacion}}</td>
                    <td>
                        <a href="{{route('libros.edit', ['libro'=>$libro->id_libro])}}" class="btn btn-info">Editar</a>
                        <form action="{{ route('libros.destroy', ['libro' => $libro->id_libro])}}" method='POST' style="display: inline-block">
                            @method('delete')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>