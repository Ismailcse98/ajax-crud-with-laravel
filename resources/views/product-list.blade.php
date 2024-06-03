<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax Crud with laravel and ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-3 text-center">Laravel ajax crud</h2>
                <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
                <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search Here...">
                <div class="table-data">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key=>$product)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$product->name}}</td> 
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="" 
                                        data-bs-toggle="modal" data-bs-target="#updateModal"
                                        data-id="{{$product->id}}"
                                        data-name="{{$product->name}}"
                                        data-price="{{$product->price}}"
                                        class="btn btn-success update_product_form">
                                        <i class="las la-edit"></i>
                                </a>
                                <a href=""
                                    data-id="{{$product->id}}"
                                    class="btn btn-danger delete_product"
                                    >
                                    <i class="las la-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>

    @include('add_product_modal')
    @include('update_product_modal')
    @include('product_js')

  </body>
</html>