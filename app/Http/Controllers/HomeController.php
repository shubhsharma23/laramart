<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Seller;
use App\Models\User;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=Product::select('*')->where('prd_status','1')
        ->join('categories', function ($join) { $join->on('products.product_cat_id', '=', 'categories.cat_id');})
        ->join('sellers', function ($join) { $join->on('products.product_seller_id', '=', 'sellers.seller_id');})
        ->get();
        return view('home',['product'=>$product]);
    }


    /**
     * controller for about page details
     *
     * @return 
     */
    public function about(){
        
        return view('about');
    }


    /**
     * add product to bucket 
     *
     * @param  $product contains product details
     * @return success
     * 
     */
    public function add(Product $product){

        $bucket=session()->get('bucket');
        
        if(!$bucket){
                $bucket=[
                    $product->id=>[
                        'id'=>$product->id,
                        'name'=>$product->prd_name,
                        'price'=>$product->prd_price,
                        'image'=>$product->prd_image,
                        'description'=>$product->prd_desc,
                        'quantity'=>1
                    ]
                    ];
                    session()->put('bucket',$bucket);  
                    return redirect()->route('bucket')->with('success','added to bucket');
        }

        if(isset($bucket[$product->id])){
            $bucket[$product->id]['quantity']++;
            session()->put('bucket',$bucket);
            return redirect()->route('bucket')->with('success','added to bucket');
        }

        $bucket[$product->id]=[
            'id'=>$product->id,
            'name'=>$product->prd_name,
            'price'=>$product->prd_price,
            'image'=>$product->prd_image,
            'description'=>$product->prd_desc,
            'quantity'=>1
        ];
        session()->put('bucket',$bucket);
            return redirect()->route('bucket')->with('success','added to bucket');
    }


    /**
     *method for remove item from cart
     *
     * @param   $request contains product id
     * @return  success message
     */

    public function remove($id)
    {
        $bucket = session()->get('bucket');

        if (isset($bucket[$id])){
            unset($bucket[$id]);
            session()->put('bucket', $bucket);
        }
        if(empty($bucket)){
            return redirect('/home');
        }
        else{
            return redirect()->back()->with('success', "Removed from bucket");
        }
    }


    /**
     * Handle the incoming request.
     *
     * @param  
     * @return list of registered users
     */

     //controller for
    public function list(){
        
        $db=User::select('*')->simplePaginate(8);
        return view('Auth.list',['data'=>$db]);
    }


    
}
