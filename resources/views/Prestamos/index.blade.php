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
        <h1>Listado de Préstamos</h1>
        <a href="{{ route('prestamos.create') }}" class="btn btn-success">Agregar Préstamo</a>
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
                    <th scope="row">{{ $prestamo->id_prestamo}}</th>
                    <td>{{ $prestamo->libro->titulo }}</td>
                    <td>{{ $prestamo->lector->nombre }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_devolucion }}</td>
                    <td>
                        <a href="{{ route('prestamos.edit', ['prestamo' => $prestamo->id_prestamo]) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('prestamos.destroy', ['prestamo' => $prestamo->id_prestamo]) }}" method="POST" style="display: inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>