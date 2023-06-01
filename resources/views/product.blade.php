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
    <a href="{{route("crud.index")}}">Ir a tiendas</a>
    <h1 class="text-center p-3">Productos</h1>

    @if (session("addProduct"))
        <div class="alert alert-success" style="width: fit-content; margin: 0 0 0 48px;">{{session("addProduct")}}</div>
    @endif

    @if (session("falseProduct"))
        <div class="alert alert-danger" style="width: fit-content; margin: 0 0 0 48px;">{{session("falseProduct")}}</div>
    @endif

    @if (session("updatedProduct"))
        <div class="alert alert-success" style="width: fit-content; margin: 0 0 0 48px;">{{session("updatedProduct")}}</div>
    @endif

    @if (session("falseUpdateProduct"))
        <div class="alert alert-danger" style="width: fit-content; margin: 0 0 0 48px;">{{session("falseUpdateProduct")}}</div>
    @endif

    @if (session("deletedProduct"))
        <div class="alert alert-success" style="width: fit-content; margin: 0 0 0 48px;">{{session("deletedProduct")}}</div>
    @endif

    @if (session("falseDeleteProduct"))
        <div class="alert alert-danger" style="width: fit-content; margin: 0 0 0 48px;">{{session("falseDeleteProduct")}}</div>
    @endif

    <script>
        var res = function(){
            var msg = confirm("¿Esta seguro de eliminar el producto?");
            return msg;
        }
    </script>

    <!-- Modal Añadir-->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("crud.createProduct")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="skuInput" class="form-label">SKU</label>
                          <input type="text" class="form-control" id="skuInput" name="txtsku" required>
                        </div>
                        <div class="mb-3">
                            <label for="nameInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nameInput" name="txtname" required>
                        </div>
                        <div class="mb-3">
                            <label for="descriptionInput" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descriptionInput" name="txtdescipcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="valorInput" class="form-label">Valor</label>
                            <input type="number" class="form-control" id="valorInput" name="txtvalor" required>
                        </div>
                        <div class="mb-3">
                            <label for="tiendaInput" class="form-label">Tienda</label>
                            <select class="form-select" name="select" required>
                              <option selected value="null">Selecciona una opción</option>
                              @foreach ($stores as $item)
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Imagen</label>
                            <input class="form-control" type="file" id="formFile" name="image" accept="images/*">
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

        <button data-bs-toggle="modal" data-bs-target="#modalAdd" class="btn btn-success" style="margin-bottom: 7px;">Añadir Producto</button>

        <table class="table table-stripped table-bordered table-hover">
            <thead class="table-dark text-white">
              <tr class="text-center">
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
                <tr class="text-center">
                  <th>{{$item->sku}}</th>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->descripcion}}</td>
                  <td>${{$item->valor}}</td>
                  <td>{{$item->tienda}}</td>
                  <td>
                    @if ($item->imagen != '')
                        <img src="{{asset('storage').'/'.$item->imagen}}" width="175px">
                    @endif

                    @if ($item->imagen == '')
                        <img src="{{asset('storage').'/images/placeholder.png'}}" width="175px">
                    @endif
                  </td>
                  <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit{{$item->sku}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href="{{route("crud.deleteProduct", $item->sku)}}" class="btn btn-danger btn-sm" onclick="return res()"><i class="fa-solid fa-trash"></i></a>
                  </td>
                    
                  <!-- Modal Edit-->
                  <div class="modal fade" id="modalEdit{{$item->sku}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route("crud.editProduct")}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label for="skuInput" class="form-label">SKU</label>
                                  <input type="text" class="form-control" id="skuInput" name="txtsku" readonly value="{{$item->sku}}">
                                </div>
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nameInput" name="txtname" value="{{$item->nombre}}">
                                </div>
                                <div class="mb-3">
                                    <label for="descriptionInput" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" id="descriptionInput" name="txtdescipcion" value="{{$item->descripcion}}">
                                </div>
                                <div class="mb-3">
                                    <label for="valorInput" class="form-label">Valor</label>
                                    <input type="text" class="form-control" id="valorInput" name="txtvalor" value="{{$item->valor}}">
                                </div>
                                <div class="mb-3">
                                    <label for="tiendaInput" class="form-label">Tienda</label>
                                    <select class="form-select" name="select">
                                        <option selected value="{{$item->tiendaid}}">{{$item->tienda}}</option>
                                        @foreach ($stores as $store)
                                            @if ($store->id != $item->tiendaid)
                                                <option value="{{$store->id}}">{{$store->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Imagen</label>
                                    <input class="form-control" type="file" id="formFile" name="image" accept="images/*">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>