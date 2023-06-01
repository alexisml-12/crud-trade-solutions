<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
</head>
<body>
    <a href="{{route("crud.products")}}">Ir a productos</a>
    <h1 class="text-center p-3">Tiendas</h1>

    @if (session("add"))
        <div class="alert alert-success" style="width: fit-content; margin: 0 0 0 48px;">{{session("add")}}</div>
    @endif

    @if (session("false"))
        <div class="alert alert-danger" style="width: fit-content; margin: 0 0 0 48px;">{{session("false")}}</div>
    @endif

    @if (session("updated"))
        <div class="alert alert-success" style="width: fit-content; margin: 0 0 0 48px;">{{session("updated")}}</div>
    @endif

    @if (session("falseUpdate"))
        <div class="alert alert-danger" style="width: fit-content; margin: 0 0 0 48px;">{{session("falseUpdate")}}</div>
    @endif

    @if (session("deleted"))
        <div class="alert alert-success" style="width: fit-content; margin: 0 0 0 48px;">{{session("deleted")}}</div>
    @endif

    @if (session("falseDelete"))
        <div class="alert alert-danger" style="width: fit-content; margin: 0 0 0 48px;">{{session("falseDelete")}}</div>
    @endif

    <!-- Modal Añadir-->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Tienda</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route("crud.createstore")}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nameInput" name="txtname" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaInput" class="form-label">Fecha de apertura</label>
                        <input type="date" class="form-control" id="fechaInput" name="txtfecha" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="p-5 table-responsive">

        <button data-bs-toggle="modal" data-bs-target="#modalAdd" class="btn btn-success" style="margin-bottom: 7px;">Añadir Tienda</button>
        
        <table class="table table-stripped table-bordered table-hover">
            <thead class="table-dark text-white">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de apertura</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $item)
                <tr>
                  <th>{{$item->id}}</th>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->fecha_apertura}}</td>
                  <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                  </td>

                  <!-- Modal Edit-->
                  <div class="modal fade" id="modalEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Tienda</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route("crud.editstore")}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="idInput" class="form-label">ID</label>
                                  <input type="text" class="form-control" id="idInput" name="txtid" readonly value="{{$item->id}}">
                                </div>
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nameInput" name="txtname" required value="{{$item->nombre}}">
                                </div>
                                <div class="mb-3">
                                    <label for="fechaInput" class="form-label">Fecha de apertura</label>
                                    <input type="date" class="form-control" id="fechaInput" name="txtfecha" required value="{{date_format(date_create($item->fecha_apertura), 'Y-m-d')}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                  </div>

                  <!-- Modal Delete-->
                  <div class="modal fade" id="modalDelete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Tienda</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route("crud.deletestore")}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label>¿Realmente desea eliminar la tienda</label><strong> {{$item->nombre}}</strong><label>?</label>
                                  <input type="text" class="form-control" id="idInput" name="txtid" hidden value="{{$item->id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                  </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>