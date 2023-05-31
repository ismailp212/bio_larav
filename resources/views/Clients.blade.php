@extends('layout')
@section('title', 'Tables - SB Admin')

@section('head')
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  crossorigin="anonymous" />
@endsection

@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Clients</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Clients</li>
                        </ol>
                        @if($T=='P')
                        <h2>Products</h2>
                        @endif
                        @if($T=='S')
                        <h2>Services</h2>
                        @endif   
                        <style>
                             h2 {
                                text-align: center;
                                }

                                        .style_form {
                                border: 1px solid #ccc;
                                }

                                .style_form {
                                border-radius: 5px;
                                }
                                .style_form {
                                text-align: center;
                                text-align-last: center;
                                }

                                </style>


                <div class="card mb-4">
                <div class="card-body">

                    <form   method="post" action="{{route('GETDATATYPE')}}">
                    {{csrf_field()}}
                        <select class='style_form' name="type" class="border-grey rounded">
                                <option value='ALL' selected>ALL</option>
                                <option value='P'>Products</option>
                                <option value='S'>Services</option>
                        </select>
                        <label for="Paid">Paid :</label>
                        <select class='style_form' name="paid" class="border-grey rounded">
                        <option value=''></option>
                                <option value='Paid'>yes</option>
                                <option value='NotPaid'>no</option>
                        </select>
                        
                        <label for="start_date">Start Date :</label>
                        <input class='style_form' type="date" id="start_date" name="start_date" >

                        <label for="end_date">End Date :</label>
                        <input class='style_form' type="date" id="end_date" name="end_date" >

                        <label for="seller">Seller :</label>
                        <input class='style_form' type="text" name="seller"/>


                        <input type="submit" value="search" />
                    </form>
                    <br>
                                        
                    <table  id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Client name</th>

                                        <th>Client number</th>
                                        
                                        
                                        @if($T=='ALL')
                                        <th>Product/Services</th>
                                        @endif
                                        @if($T=='P')
                                        <th>Product</th>
                                        @endif
                                        @if($T=='S')
                                        <th>Services</th>
                                        @endif

                                        <th>Seller</th>
                                        <th>Price</th>

                                        @if($T=='P')
                                        <th>Quantity</th>
                                        @endif

                                        <th>DATE</th>
                                        <th>Paid</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @if($T=='P')
                                        @foreach($P as $PD)
                                            <tr>
                                                
                                                <td>{{$PD->customer_name}}</td>
                                                <td>{{$PD->customer_phone}}</td>
                                                <td>{{$PD->product_name}}</td>
                                            
                                                <td>{{$PD->seller}}</td>
                                                <td>{{$PD->price}}</td>
                                                <td>{{$PD->Qantity}}</td>
                                                <td>{{$PD->order_date}}</td>
                                                <td>{{$PD->paid}}</td>
                                                
                                                <td class="action-buttons">
                                                <a href="{{ route('updateP', ['id' => $PD->id]) }}" class="btn btn-primary">UPDATE</a>     
                                                <form action="{{route('delete', ['id' => $PD->id,'T'=>'P'])}}" method="post">
                                                            {{method_field('DELETE')}}
                                                            {{csrf_field()}}

                                                            <button class="btn btn-danger" type="submit">DELETE</button>
                                                </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                @elseif($T=='S')
                                        @foreach($S as $SD)
                                                <tr>
                                                    
                                                    <td>{{$SD->customer_name}}</td>
                                                    <td>{{$SD->customer_phone}}</td>
                                                    <td>{{$SD->service_type}}</td>
                                                
                                                    <td>{{$SD->seller}}</td>
                                                    <td>{{$SD->price}}</td>
                                                    <td>{{$SD->order_date}}</td>
                                                    <td>{{$SD->paid}}</td>
                                                    
                                                    <td class="action-buttons">
                                                    <a href="{{ route('updateS', ['id' => $SD->id]) }}" class="btn btn-primary ">UPDATE</a>

                                                    <form action="{{route('delete', ['id' => $SD->id,'T'=>'S'])}}" method="post">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}

                                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                                
                                        @endforeach


                                @else        

                                
                                    @foreach($S as $SD)
                                        <tr>
                                            
                                            <td>{{$SD->customer_name}}</td>
                                            <td>{{$SD->customer_phone}}</td>
                                            <td>{{$SD->service_type}}</td>
                                        
                                            <td>{{$SD->seller}}</td>
                                            <td>{{$SD->price}}</td>
                                            <td>{{$SD->order_date}}</td>
                                            <td>{{$SD->paid}}</td>
                                            
                                            <td class="action-buttons">
                                            <a href="{{ route('updateS', ['id' => $SD->id]) }}" class="btn btn-primary ">UPDATE</a>

                                            <form action="{{route('delete', ['id' => $SD->id,'T'=>'S'])}}" method="post">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}

                                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                            </form>
                                            <!--<a href="#" class="btn btn-outline-danger delete-button"><i class="fas fa-trash"></i></a>-->
                                            </td>
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
                                            
                                            <td class="action-buttons">
                                            <a href="{{ route('updateP', ['id' => $PD->id]) }}" class="btn btn-primary">UPDATE</a>     
                                            <form action="{{route('delete', ['id' => $PD->id,'T'=>'P'])}}" method="post">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}

                                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                            </form>                            
                                            </td>
                                        </tr>
                                        @endforeach
                                @endif
                                </tbody>
                    </table>
                </div>
                </div>         
                </main>         
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
@endsection
