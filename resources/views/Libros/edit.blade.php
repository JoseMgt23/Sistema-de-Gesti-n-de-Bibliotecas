<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Libro</title>
  </head>
  <body>
    <div class="container">
    <h1>Editar Libro</h1>
    <form method="POST" action="{{ route('libros.update', ['libro' => $libro->id_libros]) }}">
        @method('put')
        @csrf
        <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" aria-describedby="codigoHelp" name="codigo" disabled="disabled" value="{{ $libro->id_libros}}">
            <div id="codigoHelp" class="form-text">Código del libro</div>
        </div>
        <div class="mb-3">
            <<label for="titulo" class="form-label">Título</label>
            <input type="text" required class="form-control" id="titulo" name="titulo" placeholder="Título del libro" value="{{ $libro->titulo }}">
        </div>
        <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
            <input type="text" required class="form-control" id="autor" name="autor" placeholder="Autor del libro" value="{{ $libro->autor }}">
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <input type="text" required class="form-control" id="genero" name="genero" placeholder="Género del libro" value="{{ $libro->genero }}">
        </div>
        <div class="mb-3">
            <label for="ano_publicacion" class="form-label">Año de Publicación</label>
            <input type="number" required class="form-control" id="ano_publicacion" name="ano_publicacion" placeholder="Año de publicación del libro" value="{{ $libro->ano_publicacion }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('libros.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>   
  </body>
</html>