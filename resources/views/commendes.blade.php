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
                        <h1 class="mt-4">Commendes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Commendes</li>
                        </ol>
                    
                     
                        <style>
                            .search {
  background-color: #007bff; /* Blue color */
  width: 90px ;
  color: #fff; /* Text color */
  border: none; /* Remove border */
  padding: 10px 10px; /* Adjust padding as needed */
  font-size: 16px; /* Adjust font size as needed */
  border-radius: 4px; /* Add rounded corners */
  cursor: pointer; /* Show pointer on hover */
}

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

                    <form   method="post" action="{{route('commendes_data')}}">
                    {{csrf_field()}}
                        <!--<select class='style_form' name="type" class="border-grey rounded">
                                <option value='ALL' selected>ALL</option>
                                <option value='P'>Products</option>
                                <option value='S'>Services</option>
                        </select> -->
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


                        <input class="search" type="submit" value="search" />
                    </form>
                    <br>
                                        
                    <table  id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Client name</th>
                                        <th>Client number</th>
                                        <th>Products</th>
                                        <th>Seller</th>
                                        <th>Price</th>
                                        <th>Qantity</th>
                                        <th>DATE</th>
                                        <th>Paid</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                
                                  
                                        @foreach($T as $SD)
                                                <tr>
                                                    
                                                <td>{{$SD->customer_name}}</td>
                                                <td>{{$SD->customer_phone}}</td>
                                                <td>{{$SD->product_name}}</td>                                        
                                                <td>{{$SD->seller}}</td>
                                                <td>{{$SD->price}}</td>
                                                <td>{{$SD->Qantity}}</td>
                                                <td>{{$SD->order_date}}</td>
                                                <td>{{$SD->paid}}</td>
                                                    
                                                    <td class="action-buttons">
                                                    <a href="{{ route('updateP', ['id' => $SD->id]) }}" class="btn btn-primary ">UPDATE</a>
<hr>
                                                    <form action="{{route('delete', ['id' => $SD->id,'T'=>'P'])}}" method="post">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}

                                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                                
                                        @endforeach


                                
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
