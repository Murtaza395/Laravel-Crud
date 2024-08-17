<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Simple LAravel Crud</title>
</head>
<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Laravel Crud</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
            <div class="card borde-0 shadow-1g my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white"> Create Product</h3>
                </div>
                <form enctype="multipart/form-data" action="{{route('products.store')}}" method="post">
                    @csrf
                <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label h4">Name</label>
                    <input type="text" class="@error('name') is-invalid  @enderror form-control form-control-1g" value ="{{old('name')}}" placeholder="Name" name="name">
                    @error('name')
                        <p class="invalid feedback">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label h4">Sku</label>
                    <input type="text" class="@error('sku') is-invalid  @enderror form-control form-control-1g" value ="{{old('sku')}}" placeholder="Sku" name="sku">
                    @error('sku')
                    <p class="invalid feedback">{{$message}}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label h4">price</label>
                    <input type="text" class="@error('price') is-invalid  @enderror form-control form-control-1g" placeholder="Price"value ="{{old('price')}}" name="price">
                    @error('price')
                    <p class="invalid feedback">{{$message}}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label h4">Description</label>
                    <textarea class="form-control form-control-1g" name="description" value ="{{old('description')}}" rows=5></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label h4">Image</label>
                    <input type="file" class="form-control form-control-1g" value ="{{old('image')}}" name="image">
                </div>
                <div class="d-grid">
                <button class="btn btn-lg btn-primary" name="save"> Submit </button>
                </div>
            </div>
        </form>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>