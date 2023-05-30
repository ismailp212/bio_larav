<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\products;
use App\Models\services;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controller1 extends Controller
{
   public function view(){
      $getP=products::all();
      $getS=services::all();

      return view('master',['P'=>$getP,'S'=>$getS]);
   }

/* ---------------------------------------------------------------------- */

   public function ADDP(){
      return view('products');
   }
   public function ADDPTODB(Request $req){
      $min = 1000;
      $max = 9999;
      $idP = random_int($min, $max);
      $idC = random_int($min, $max);

      DB::table('products')->insert(['id'=>$idP,'product_name'=>$req->ProductN,
      'customer_id'=>$idC,'customer_phone'=>$req->clientnum,'customer_name'=>$req->ClientN,
      'seller'=>$req->seller,'paid'=>$req->P,'order_date'=>$req->date,'price'=>$req->price,'Qantity'=>$req->Qte]);

      DB::table('customers')->insert(['customer_id'=>$idC,'customer_name'=>$req->ClientN,
      'customer_phone'=>$req->clientnum]);

      return redirect()->route('ADDP');
   }

/* ---------------------------------------------------------------------- */


   public function ADDS(){
      return view('services');
   }
   public function ADDSTODB(Request $req){
      $min = 1000;
      $max = 9999;
      $idS = random_int($min, $max);
      $idC = random_int($min, $max);

      DB::table('services')->insert(['id'=>$idS,'service_type'=>$req->service_type,
      'customer_id'=>$idC,'customer_phone'=>$req->clientnum,'customer_name'=>$req->ClientN,
      'seller'=>$req->seller,'paid'=>$req->P,'order_date'=>$req->date,'price'=>$req->price]);

      DB::table('customers')->insert(['customer_id'=>$idC,'customer_name'=>$req->ClientN,
      'customer_phone'=>$req->clientnum]);

      return redirect()->route('ADDS');
   }

/* ---------------------------------------------------------------------- */


   public function GETDATATYPE (Request $req){

      $TYPE=$req->type;
      $paid=$req->paid;
      $start_date=$req->start_date;
      $end_date=$req->end_date;
      $seller=$req->seller;


      $getP=products::all();
      $getS=services::all();

      if(isset($start_date) AND isset($end_date) AND isset($seller) AND isset($paid))
      {
         $p=products::where("order_date",">=",$start_date)->where("order_date","<=",$end_date)->where("seller",$seller)->where("paid",$paid)->get();
         $s=services::where("order_date",">=",$start_date)->where("order_date","<=",$end_date)->where("seller",$seller)->where("paid",$paid) ->get();

         return view('Clients',['T'=>$TYPE,'P'=>$p,'S'=>$s]);
      }
      if(isset($start_date) AND isset($end_date))
      {
         $p=products::where("order_date",">=",$start_date)->where("order_date","<=",$end_date)->get();
         $s=services::where("order_date",">=",$start_date)->where("order_date","<=",$end_date)->get();

         return view('Clients',['T'=>$TYPE,'P'=>$p,'S'=>$s]);
      }
      elseif( isset($seller) AND isset($paid)){
         $p=products::where("seller",$seller)->where("paid",$paid)->get();
         $s=services::where("seller",$seller)->where("paid",$paid)->get();
         return view('Clients',['T'=>$TYPE,'P'=>$p,'S'=>$s]);
      }
      elseif( isset($paid)){
         $p=products::where("paid",$paid)->get();
         $s=services::where("paid",$paid)->get();
         return view('Clients',['T'=>$TYPE,'P'=>$p,'S'=>$s]);
      }
      elseif( isset($seller)){
         $p=products::where("seller",$seller)->get();
         $s=services::where("seller",$seller)->get();
         return view('Clients',['T'=>$TYPE,'P'=>$p,'S'=>$s]);
      }
      else {
         return view('Clients',['T'=>$TYPE,'P'=>$getP,'S'=>$getS]);
      }
      

      
   }


   public function GETDATA (){

      $getP=products::all();
      $getS=services::all();

      return view('Clients',['T'=>'ALL','P'=>$getP,'S'=>$getS]);
   }

   /* ---------------------------------------------------------------------- */


   public function charts()
   {
      //$data = DB::table('my_table')->select('number1', 'number2')->first();
     
      return view('charts');
      
   }

/* ---------------------------------------------------------------------- */


   public function updateS()
   {
      $id1 = request('id');

      //$variable=services::select('customer_name')->where('service_id',$id)->get();
      $variable = services::where('id', $id1)->first();   
      
      $name=$variable->customer_name;
      $customer_phone=$variable->customer_phone;
      $price=$variable->price;
      $seller=$variable->seller;
      $order_date=$variable->order_date;
      $service_type=$variable->service_type;
      $paid=$variable->paid;
      $service_id=$variable->id;

       return view('updateS',['name'=>$name,'customer_phone'=>$customer_phone,'price'=>$price,'seller'=>$seller,'order_date'=>$order_date,'service_type'=>$service_type,'paid'=>$paid,'service_id'=> $service_id]);
   }

   public function updateSD (Request $req){
         $up=services::where('id',$req->service_id)->update(['customer_name'=>$req->ClientN,'customer_phone'=>$req->clientnum,'price'=>$req->price,'seller'=>$req->seller,'order_date'=>$req->date,'service_type'=>$req->service_type,'paid'=>$req->P]);
         return redirect()->route('GETDATA');
   }

   /* ---------------------------------------------------------------------- */


   public function updateP()
   {
      $id = request('id');
            //$variable=services::select('customer_name')->where('service_id',$id)->get();
            $variable = products::where('id', $id)->first();   
      
            $name=$variable->customer_name;
            $customer_phone=$variable->customer_phone;
            $price=$variable->price;
            $seller=$variable->seller;
            $order_date=$variable->order_date;
            $product_name=$variable->product_name;
            $paid=$variable->paid;
            $product_id=$variable->id;
            $Qantity=$variable->Qantity;
      
             return view('updateP',['name'=>$name,'customer_phone'=>$customer_phone,'price'=>$price,'seller'=>$seller,'order_date'=>$order_date,'ProductN'=>$product_name,'paid'=>$paid,'product_id'=> $product_id,'Qantity'=> $Qantity]);
   }

   public function updatePD(Request $req)
   {
      $up=products::where('id',$req->product_id)->update(['customer_name'=>$req->ClientN,'customer_phone'=>$req->clientnum,'price'=>$req->price,'seller'=>$req->seller,'order_date'=>$req->date,'product_name'=>$req->ProductN,'paid'=>$req->P,'Qantity'=>$req->Qantity]);
         return redirect()->route('GETDATA');
   }


/* ---------------------------------------------------------------------- */


   public function delete()
   {
      $id = request('id');
      $T = request('T');

      if($T=="S"){
         $variable = services::where('id', $id)->delete();
      }
      else{
         $variable = products::where('id', $id)->delete();
        }
      

       return redirect()->back();
   }


   /* ---------------------------------------------------------------------- */


   




   
   
   }

   


 

