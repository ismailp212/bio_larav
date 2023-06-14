@extends('layout')
@section('title', 'Tables - SB Admin')
@section('head')
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
@endsection
        
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart 
                                        <form class="style_form">
                                        <style>
                                        .style_form {
                                        border-radius: 5px;
                                        }
                                        .style_form {
                                        text-align: right;
                                        text-align-last: right;
                                        }
                                        </style>
                                            <select>
                                                <option>May</option>
                                            </select>
                                        </form>  
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart 
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Nos clients 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <th>Client name</th>
                                    <th>Client number</th>
                                    <th>Product/Services</th>
                                    <th>Seller</th>
                                    <th>Price</th>
                                    <th>DATE</th>
                                    <th>Paid</th>
                                    
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($S as $SD)
                        <tr>
                            
                            <td>{{$SD->customer_name}}</td>
                            <td>{{$SD->customer_phone}}</td>
                            <td>{{$SD->service_type}}</td>
                            <td>{{$SD->seller}}</td>
                            <td>{{$SD->price}}</td>
                            <td>{{$SD->order_date}}</td>
                            <td>{{$SD->paid}}</td>
                            
                            
                        </tr>
                        
                    @endforeach
                    @foreach($P as $PD)
                        <tr>
                            
                            <td>{{$PD->customer_name}}</td>
                            <td>{{$PD->customer_phone}}</td>
                            <td>{{$PD->product_name}}</td> 
                            <td>{{$PD->seller}}</td>
                            <td>{{$PD->price}}</td>
                            <td>{{$PD->order_date}}</td>
                            <td>{{$PD->paid}}</td>
                            
                            
                        </tr>
                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
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
