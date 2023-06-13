@extends('layout')
@section('title', 'Tables - SB Admin')

@section('head')
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection

@section('content')

        <script>
            $(document).ready(function() {

            // Fade out success message after 3 seconds
            $('#success-message').delay(2500).fadeOut(500);

            // Fade out error message after 3 seconds
            $('#error-message').delay(2500).fadeOut(500);
        });

         </script>
         
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
                    <h2 class="text-center mb-4">Nouveau Collection</h2>
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


  @if($etat == 'update')

                <form action="{{ route('update_coll_data',['id'=>$T->id]) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Nom Collection</label>
                            <input type="text" class="form-control" name="nom_coll" value="{{$T->name}}" placeholder="Enter product title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description_coll" rows="3"  placeholder="{{$T->description}}"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="old-price">Old Price</label>
                            <input type="number" class="form-control" name="old_price_coll" value="{{$T->old_price}}" placeholder="Enter old price">
                        </div>
                        <div class="form-group">
                            <label for="actual-price">Actual Price</label>
                            <input type="number" class="form-control" name="actual_price_coll" value="{{$T->actual_price}}" placeholder="Enter actual price">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" value="{{$T->value}}" name="image_coll">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

            </div>
         </div>
          
  
  @endif

 

                @if($etat == 'normal')

                    <form action="{{ route('NewColl') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Nom Collection</label>
                            <input type="text" class="form-control" name="nom_coll" placeholder="Enter product title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description_coll" rows="3" placeholder="Enter product description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="old-price">Old Price</label>
                            <input type="number" class="form-control" name="old-price_coll" placeholder="Enter old price">
                        </div>
                        <div class="form-group">
                            <label for="actual-price">Actual Price</label>
                            <input type="number" class="form-control" name="actual-price_coll" placeholder="Enter actual price">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" name="image_coll">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>

            </div>
         </div>
          

            <div class="container">
                <h1>Product List</h1>
                <div class="row">
                    @foreach($Colls as $coll)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <img src="" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{$coll->name}}</h5>
                                    <p class="card-text">{{$coll->description}}</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Old Price:<span>{{$coll->old_price}}</span></span>
                                        <h6 class="text-success">Actual Price:<span>{{$coll->actual_price}}</span></h6>
                                    </div>
                                    <div class="mt-3">
                                        <form action="{{route('delete_coll', ['id' => $coll->id])}}" method="post">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}

                                            <button class="btn btn-danger btn-sm mr-2 delete-btn" type="submit">DELETE</button>
                                        </form>
                                        <br>
                                        <a href="{{route('update_coll',['id'=> $coll->id])}}"><button class="btn btn-primary btn-sm update-btn">Update</button></a>
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
    



                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
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
