@extends('layout')
@section('title', 'Dashboard - SB Admin')

@section('head')
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
@endsection        



@section('content')
            <div id="layoutSidenav_content"> 
            <div class="container-fluid px-4">
            <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouvelle Commande</h3></div>
                                    <div class="card-body">
                                        <form action="{{route('ADDPTODB')}}"  method="post">
                                        {{csrf_field()}}
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="ProductN" type="text" placeholder="Product" />
                                                <label for="inputEmail">Product Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="ClientN" type="text" placeholder="Client" />
                                                <label for="inputEmail">Client Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="clientnum" type="text" placeholder="Phone number" />
                                                <label for="inputEmail">Phone number</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="price" type="text" placeholder="Price" />
                                                <label for="inputEmail">Price</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="Qte" type="number" placeholder="Quantity" />
                                                <label for="inputEmail">Quantity</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="date" type="date" placeholder="Date" />
                                                <label for="inputPassword">Date</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="seller" type="text" placeholder="Seller" />
                                                <label for="inputPassword">Seller</label>
                                            </div>

                                            <div class="form-check mb-3">
                                            <label class="form-check-label" for="inputRememberPassword">Paid</label>
                                                <input class="form-check-input"  id= "inputRememberPassword" name="P" type="radio" value="Paid" />
                                               
                                            </div>
                                            <div class="form-check mb-3">
                                            <label class="form-check-label" for="inputNotPaid">Not Paid</label>
                                                <input class="form-check-input"  id= "inputNotPaid" name="P" type="radio" value="NotPaid" />
                                               
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                               <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input class="btn btn-primary" type="submit"value='submit'/>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
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