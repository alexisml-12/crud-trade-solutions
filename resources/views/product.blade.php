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
    <h1 class="text-center p-3">Productos</h1>

    <div class="p-5 table-responsive">
        <table class="table table-stripped table-bordered table-hover">
            <thead class="table-dark text-white">
              <tr>
                <th scope="col">SKU</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Valor</th>
                <th scope="col">Tienda</th>
                <th scope="col">Imagen</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $item)
                <tr>
                  <th>{{$item->sku}}</th>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->descripcion}}</td>
                  <td>${{$item->valor}}</td>
                  <td>{{$item->tienda}}</td>
                  <td>{{$item->imagen}}</td>
                  <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                  </td>
                    
                  <!-- Modal Edit-->
                  <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                  <label for="skuInput" class="form-label">SKU</label>
                                  <input type="text" class="form-control" id="skuInput" name="txtsku" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nameInput" name="txtname">
                                </div>
                                <div class="mb-3">
                                    <label for="descriptionInput" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" id="descriptionInput" name="txtdescipcion">
                                </div>
                                <div class="mb-3">
                                    <label for="valorInput" class="form-label">Valor</label>
                                    <input type="text" class="form-control" id="valorInput" name="txtvalor">
                                </div>
                                <div class="mb-3">
                                    <label for="tiendaInput" class="form-label">Tienda</label>
                                    <input type="text" class="form-control" id="tiendaInput" name="txttienda">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Imagen</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guardar</button>
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