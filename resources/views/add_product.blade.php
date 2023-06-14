@extends('layout')
@section('title', 'Tables - SB Admin')

@section('head')
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection

@section('content')
            
    <div id="layoutSidenav_content">
            <style>
                    body {
                    background-color: #f8f9fa;
                    }

                    .form-container {
                    max-width: 1000px;
                    margin: 50px auto;
                    padding: 30px;
                    border: 1px solid #17a2b8;
                    background-color: #e9f8fb;
                    color: #17a2b8;
                    border-radius: 5px;
                    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
                    }
            </style>
            <div class="container">
                <div class="form-container">
                    
                    @if(session('success'))
                        <div id="success-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div id="error-message" class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <script>
                        $(document).ready(function() {

                        // Fade out success message after 3 seconds
                        $('#success-message').delay(2500).fadeOut(500);

                        // Fade out error message after 3 seconds
                        $('#error-message').delay(2500).fadeOut(500);
                            });

                    </script>




                    @if($etat == 'update')
                    <h2 class="text-center mb-4">Update Produit</h2>

                    <form action="{{ route('update_prod_data',['id'=>$T->id]) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" value="{{$T->titre}}" name="title" placeholder="Enter product title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description"  rows="3" placeholder="{{$T->description}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control"  name="category">
                                <option value="{{$T->category}}" disabled selected>Select a category</option>
                                <option value="Miel">Miel</option>
                                <option value="Crème">Crème</option>
                                <option value="Huile">Huile</option>
                                <option value="Poudre">Poudre</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="old-price">Old Price</label>
                            <input type="number" class="form-control" name="old_price" value="{{$T->old_price}}" placeholder="Enter old price">
                        </div>
                        <div class="form-group">
                            <label for="actual-price">Actual Price</label>
                            <input type="number" class="form-control" name="actual_price" value="{{$T->actual_price}}" placeholder="Enter actual price">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" value="{{$T->image}}" name="image">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

            </div>
         </div>


                    @endif




                    @if($etat == 'normal')

                    <h2 class="text-center mb-4">Nouveau Produit</h2>
                    <form action="{{ route('NewProd') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter product title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter product description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="category">
                                <option value="" disabled selected>Select a category</option>
                                <option value="Miel">Miel</option>
                                <option value="Crème">Crème</option>
                                <option value="Huile">Huile</option>
                                <option value="Poudre">Poudre</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="old-price">Old Price</label>
                            <input type="number" class="form-control" name="old_price" placeholder="Enter old price">
                        </div>
                        <div class="form-group">
                            <label for="actual-price">Actual Price</label>
                            <input type="number" class="form-control" name="actual_price" placeholder="Enter actual price">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>

            </div>
         </div>
          



            <div class="container">
                <h1>Product List</h1>
                <div class="row">
                    @foreach($Prods as $prod)
                        <div class="col-md-4">
                            <div class="card mb-3">
                            <img src="{{$prod->image}}" alt="Image">

                                
                                <div class="card-body">
                                    <h4 class="text-muted">{{$prod->category}}</h4>
                                    <h5 class="card-title">{{$prod->titre}}</h5>
                                    <p class="card-text">{{$prod->description}}</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Old Price:<span>{{$prod->old_price}}</span></span>
                                        <h6 class="text-success">Actual Price:<span>{{$prod->actual_price}}</span></h6>
                                    </div>
                                    <div class="mt-3">
                                    <form action="{{route('delete_prod', ['id' => $prod->id])}}" method="post">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}

                                            <button class="btn btn-danger btn-sm mr-2 delete-btn" type="submit">DELETE</button>
                                    </form>
                                        <br>
                                        <a href="{{route('update_prod',['id'=> $prod->id])}}"><button class="btn btn-primary btn-sm update-btn">Update</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($loop->iteration % 3 === 0)
                            </div><div class="row">
                        @endif
                    @endforeach
                </div>
            </div>

            @endif

                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
@endsection
