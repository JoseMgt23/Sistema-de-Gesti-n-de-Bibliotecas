<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar Libro</title>
  </head>
  <body>
    <div class="container">
    <h1>Agregar Libro</h1>
    <form method="POST" action="{{ route('libros.store') }}">
        @csrf
        <div class="mb-3">
            <label for="id_libros" class="form-label">Código</label>
            <input type="text" class="form-control" id="id_libros" aria-describedby="idHelp" name="id_libros" disabled="disabled">
            <div id="idHelp" class="form-text">Código del libro</div>
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" required class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp" 
            placeholder="Título del libro">
        </div>
        <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
            <input type="text" required class="form-control" id="autor" name="autor" aria-describedby="autorHelp" 
            placeholder="Autor del libro">
        </div>
        <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" required class="form-control" id="isbn" name="isbn" aria-describedby="isbnHelp" 
           placeholder="ISBN del libro">
        </div>
        <div class="mb-3">
            <label for="ano_publicacion" class="form-label">Año de Publicación</label>
            <input type="number" required class="form-control" id="ano_publicacion" name="ano_publicacion" aria-describedby="ano_publicacionHelp" placeholder="Año de publicación del libro">
        </div>
        <div class="mb-3">
        <label for="editorial" class="form-label">Editorial</label>
        <input type="text" required class="form-control" id="editorial" name="editorial" aria-describedby="editorialHelp" 
           placeholder="Editorial del libro">
        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('lectores.index')}}" class="btn btn-warning">Cancel</a>
        </div>
    </form>
</div>
  </body>
</html>