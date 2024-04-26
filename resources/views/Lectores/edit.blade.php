<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Lector</title>
  </head>
  <body>
    <div class="container">
    <h1>Editar Lector</h1>
    <form method="POST" action="{{route('lectores.update', ['lector' => $lector->id_lectores])}}">
    @method('put')
    @csrf
        <div class="mb-3">
        <label for="codigo" class="form-label">Id</label>
        <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
            disabled="disabled" value="{{ $lector->id}}">
        <div id="idHelp" class="form-text">Lector Code</div>
  </div>
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" required class="form-control" id="nombre" name="nombre" 
    placeholder="Nombre Lector" value="{{$lector->nombre}}">
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" required class="form-control" id="apellido" name="apellido"
    placeholder="Apellido Lector" value="{{$lector->apellido}}">
  </div>
  <div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text" required class="form-control" id="direccion" name="direccion" 
        placeholder="Direccion Lector" value="{{$lector->direccion}}">
  </div>
  <div class="mb-3">
    <label for="telefono" class="form-label">Teléfono</label>
    <input type="text" required class="form-control" id="telefono" name="telefono" 
        placeholder="Teléfono Lector" value="{{$lector->telefono}}">
</div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" required class="form-control" id="email" name="email" 
    placeholder="Email Lector" value="{{$lector->email}}">

  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('lectores.index')}}" class="btn btn-warning">Cancel</a>
  </div>
</form>
    </div>
  </body>
</html>