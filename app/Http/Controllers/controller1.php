<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use App\Models\customers;
use App\Models\products;
use App\Models\services;
use App\Models\customer;
use App\Models\NouveauProduit;
use App\Models\NouveauColl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users;

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


public function storeProds(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category' => 'required',
        'old-price' => 'required',
        'actual-price' => 'required',
        'image' => 'required|image',
    ]);

    $title = $validatedData['title'];
    $description = $validatedData['description'];
    $category = $request->input('category');
    $oldPrice = $validatedData['old-price'];
    $actualPrice = $validatedData['actual-price'];
    $image = $request->file('image')->store('images');

    $inserted = NouveauProduit::create([
        'titre' => $title,
        'description' => $description,
        'category' => $category,
        'old_price' => $oldPrice,
        'actual_price' => $actualPrice,
        'image' => $image
    ]);

    if ($inserted) {
        return redirect()->route('novoprod')->with('success', 'Product added successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to add product.');
    }
}


/* ---------------------------------------------------------------------- */



public function listProds()
{
    $getProd = NouveauProduit::all();
    return view('add_product', ['Prods' => $getProd]);
}

/* ---------------------------------------------------------------------- */



public function listprodsJSON(){

   $newproducts = NouveauProduit::all();

   return response()->json($newproducts);
}

/* ---------------------------------------------------------------------- */

public function listCollec(){
   $getColl = NouveauColl::all();
   return view('add_collection' , ['Colls' => $getColl]);
}


/* ---------------------------------------------------------------------- */


public function storeCollec(Request $request)
{
    $validatedData = $request->validate([
        'nom_coll' => 'required',
        'description_coll' => 'required',
        'old-price_coll' => 'required',
        'actual-price_coll' => 'required',
        'image_coll' => 'required|image',
    ]);

    $title = $validatedData['nom_coll'];
    $description = $validatedData['description_coll'];
    $category = $request->input('category');
    $oldPrice = $validatedData['old-price_coll'];
    $actualPrice = $validatedData['actual-price_coll'];
    $image = $request->file('image_coll')->store('public/collcetions_images');

    // Remove the "public/" prefix from the image path
    $imagePath = str_replace('public/', '', $image);

    $inserted = NouveauColl::create([
        'name' => $title,
        'description' => $description,
        'actual_price' => $actualPrice,
        'old_price' => $oldPrice,
        'photo' => $imagePath, // Use the updated image path here
    ]);

    if ($inserted) {
        return redirect()->route('novocoll')->with('success', 'Collection added successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to add product.');
    }
}





/* ---------------------------------------------------------------------- */


public function listcollsJSON(){

   $newcollections = NouveauColl::all();

   foreach ($newcollections as $collection) {
      $collection->photo = asset('storage/' . $collection->photo);
  }

   return response()->json($newcollections);
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
         return redirect()->route('reservation');
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
         return redirect()->route('commendes');
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


   public function login(Request $req){


      if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
         $req->session()->regenerate();


         $C=users::where("email",$req->email)->first();
         session()->put('company_name',$C->company_name );

         return redirect()->route('dashboard'); 
         }

         return back()->withErrors([
         'message' => 'Adresse email invalide!',
         ])->onlyInput('email');
         
   }



   /* ---------------------------------------------------------------------- */


   public function register(){

      return view('register');

   }

     /* ---------------------------------------------------------------------- */


     public function registerD(Request $req){

      //dd($req->all());

      $validate=$req->validate([
         'company_name' => 'required|string|max:255',
         'company_number' => 'required|string|max:255',
         'email' => 
         'required|string|email|max:255|unique:users',
         'password' => 
         'required|string|min:8|confirmed',
         ]);

         $user = Users::create([
         'company_name' => $validate['company_name'],
         'company_number' => $req->company_number,
         'email' => $validate['email'],
         'password' => Hash::make($validate['password']),
         ]);

         if ($user) {

            auth()->login($user);

            return redirect()->route('dashboard');
        } else {
         return redirect()->back()->withErrors(['message' => 'Failed to create user.'])->withInput();
        }

   }


  /* ---------------------------------------------------------------------- */



   public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('login');
      }

    /* ---------------------------------------------------------------------- */


    public function reservation(){
      $T=services::all();
      return view('reservation',['T'=>$T]);
    }

    /* ---------------------------------------------------------------------- */

    public function reservation_data(Request $req){

      
      $paid=$req->paid;
      $start_date=$req->start_date;
      $end_date=$req->end_date;
      $seller=$req->seller;


      $getP=products::all();
      $getS=services::all();

      if(isset($start_date) AND isset($end_date) AND isset($seller) AND isset($paid))
      {
         $s=services::where("order_date",">=",$start_date)->where("order_date","<=",$end_date)->where("seller",$seller)->where("paid",$paid) ->get();

         return view('reservation',['T'=>$s]);
      }
      if(isset($start_date) AND isset($end_date))
      {
         $s=services::where("order_date",">=",$start_date)->where("order_date","<=",$end_date)->get();

         return view('reservation',['T'=>$s]);
      }
      elseif( isset($seller) AND isset($paid)){

         $s=services::where("seller",$seller)->where("paid",$paid)->get();

         return view('reservation',['T'=>$s]);    
        }
      elseif( isset($paid)){

         $s=services::where("paid",$paid)->get();

         return view('reservation',['T'=>$s]);
      }
      elseif( isset($seller)){
        
         $s=services::where("seller",$seller)->get();

          return view('reservation',['T'=>$s]);
      }
      else {
         return view('reservation',['T'=>$getS]);
      }
    }


    /* ---------------------------------------------------------------------- */


   public function commendes(){
   $T=products::all();
   return view('commendes',['T'=>$T]);
    }

     /* ---------------------------------------------------------------------- */

    public function commendes_data(Request $req){

     
      $paid=$req->paid;
      $start_date=$req->start_date;
      $end_date=$req->end_date;
      $seller=$req->seller;


      $getP=products::all();
      

      if(isset($start_date) AND isset($end_date) AND isset($seller) AND isset($paid))
      {
         $p=products::where("order_date",">=",$start_date)->where("order_date","<=",$end_date)->where("seller",$seller)->where("paid",$paid)->get();

         return view('commendes',['T'=>$p]);
      }
      if(isset($start_date) AND isset($end_date))
      {
         $p=products::where("order_date",">=",$start_date)->where("order_date","<=",$end_date)->get();

         
         return view('commendes',['T'=>$p]);
      }
      elseif( isset($seller) AND isset($paid)){
         $p=products::where("seller",$seller)->where("paid",$paid)->get();

         return view('commendes',['T'=>$p]);
      }
      elseif( isset($paid)){
         $p=products::where("paid",$paid)->get();

         return view('commendes',['T'=>$p]);
      }
      elseif( isset($seller)){
         $p=products::where("seller",$seller)->get();

         return view('commendes',['T'=>$p]);
      }
      else {
         return view('commendes',['T'=>$getP]);
      }

    }

     
   }

   


 

