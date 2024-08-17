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
                <a href="{{route('products.create')}}" class="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
        @if (Session::has('success'))
        <div class="col-md-10 mt-4">
            <div class="alert alert-success ">
            {{Session::get('success')}}
            </div>
        </div>
        @endif
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th></th>
                    <th>Name</th>
                    <th>Sku</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
                @if($products->isNotEmpty())
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        @if($product->image!="")
                        <img width="60" src="{{asset('/uploads/products/'.$product->image)}}"
                        @endif
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->sku}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{\Carbon\Carbon::parse($product->created_at)->format('d M,Y')}}</td>
                    <td>
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-dark">Edit</a>
                        <a href="#" onClick="deleteProduct({{$product->id}})" class="btn btn-danger">Delete</a>
                        <form id="delete-product-from-{{$product->id}}" action="{{route('products.destroy',$product->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
            <div class="col-md-10">
            <div class="card borde-0 shadow-1g my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white">Products</h3>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<script>
    function deleteProduct(id){
        if(confirm("Are you sure to delete?")){
            document.getElementById("delete-product-from-"+ id).submit();
        }
    }
    </script>