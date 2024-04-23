<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar Lector</title>
  </head>
  <body>
    <div class="container">
    <h1>Agregar Lector</h1>
    <form method="POST" action="{{route('lectores.store')}}">
    @csrf
        <div class="mb-3">
        <label for="id_lector" class="form-label">Code</label>
        <input type="text" class="form-control" id="id_lector" aria-describedby="idHelp" name="id"
            disabled="disabled">
        <div id="idHelp" class="form-text">Lector Code </div>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" required class="form-control" id="name" name="name" aria-describedby="nombreHelp"
    placeholder="Nombre Lector">
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" required class="form-control" id="apellido" name="apellido" aria-describedby="apellidoHelp"
    placeholder="Apellido Lector">
  </div>
  <div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text" required class="form-control" id="direccion" name="direccion" aria-describedby="direccionHelp"
        placeholder="Direccion Lector">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" required class="form-control" id="email" name="email" aria-describedby="emailHelp"
    placeholder="Email Lector">

  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('lectores.index')}}" class="btn btn-warning">Cancel</a>
  </div>
</form>
    </div>
  </body>
</html>