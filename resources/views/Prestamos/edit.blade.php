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
        <h1>Nuevo Préstamo</h1>
        <form action="{{ route('prestamos.update', ['prestamo' => $prestamo->id_prestamo]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
                <label for="libro_id" class="form-label">Libro</label>
                <select class="form-control" id="id_libro" name="id_libro">
                    @foreach ($libros as $libro)
                        <option value="{{ $libro->id_libro }}" {{ $prestamo->id_libro == $libro->id ? 'selected' : '' }}>{{ $libro->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="lector_id" class="form-label">Lector</label>
                <select class="form-control" id="id_lector" name="id_lector">
                    @foreach ($lectores as $lector)
                        <option value="{{ $lector->id_lector }}" {{ $prestamo->id_lector == $lector->id ? 'selected' : '' }}>{{ $lector->nombre }} {{ $lector->apellido }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
                <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" value="{{ $prestamo->fecha_prestamo }}">
            </div>
            <div class="mb-3">
                <label for="fecha_devolucion" class="form-label">Fecha de Devolución</label>
                <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion" value="{{ $prestamo->fecha_devolucion }}">
            </div>
            <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{route('prestamos.index')}}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
    </body>
</html>