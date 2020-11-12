<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Seller;

class adminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param   $request 
     * @return \Illuminate\Http\Response retutn all products detail for the admin view
     */
    public function admin(Request $request)
    {
        //
        
        $db=product::select('*')
        ->join('categories', function ($join) { $join->on('products.product_cat_id', '=', 'categories.cat_id');})
        ->join('sellers', function ($join) { $join->on('products.product_seller_id', '=', 'sellers.seller_id');})
        ->simplePaginate(7);
        return view('admin.admin',['data'=>$db]);
    }


    /**
     * Handle the product activation and deactivation.
     *
     * @param    $operation to perform, $id of that product
     * @return   update operation and redirect to same page
     */
    public function status($operation, $id){
        if($operation=='activate'){
            $action=DB::table('products')
            ->where('id', $id)
            ->update(['prd_status' => 1]);
          }
          else if($operation=='deactivate'){
            $action=DB::table('products')
            ->where('id', $id)
            ->update(['prd_status' => 0]);
          }
          return redirect()->back();
    }

    /**
     * Handle the routing of add and edit click
     *
     * @param    $id of the product if edit click
     * @return   redirect to  the manage form, with products details for edit
     */

    public function manage_product($id=null){
        $cat_name_array=Category::select('cat_name')->get();
        $seller_name_array=Seller::select('seller_name')->get();

        if($id){
            $product=product::
            join('categories', function ($join) { $join->on('products.product_cat_id', '=', 'categories.cat_id');})
            ->join('sellers', function ($join) { $join->on('products.product_seller_id', '=', 'sellers.seller_id');})
            ->find($id);

            return view('admin.manage',
            ['p'=>$product],
            ['c'=>$cat_name_array])->with('s',$seller_name_array);

        }
        else{
            return view('admin.manage',
            ['c'=>$cat_name_array],
            ['s'=>$seller_name_array]
        );
        }
    }



    /**
     * Handle the incoming request to add product
     *
     * @param  $request, 
     * @return added product to db and redirect to admin form
     */

    public function add_product(Request $request){
            
        $request->validate([
            'product_name'=>"required",
            'product_price'=>'required | numeric | min:2',
            'product_image'=>"required",
            'product_description'=>"required",
            'product_category'=>"required",
            'product_seller'=>"required",
        ]);

        $add=new product;
        $add->prd_name=$request->input('product_name');
        $add->prd_image=$request->input('product_image');
        $add->prd_desc=$request->input('product_description');
        $add->prd_price=$request->input('product_price');
        $add->product_cat_id=category::where('cat_name',$request->input('product_category'))->value('cat_id'); 
        $add->product_seller_id=seller::where('seller_name',$request->input('product_seller'))->value('seller_id');
        $add->save();

        return redirect('admin');
    }



    /**
     * Handle the incoming request for update product details.
     *
     * @param  $request, $id of the product
     * @return updated the product details correspondence to id
     */

    public function edit_product(Request $request,$id){


        $request->validate([
            'product_name'=>"required",
            'product_price'=>'required | numeric | min:2',
            'product_image'=>"required",
            'product_description'=>"required",
            'product_category'=>"required",
            'product_seller'=>"required",
        ]);

        product::where('id', $id)
              ->update([
                'prd_name'=>$request->input('product_name'),
                'prd_image'=>$request->input('product_image'),
                'prd_desc'=>$request->input('product_description'),
                'prd_price'=>$request->input('product_price'),
                'product_cat_id'=>category::where('cat_name',$request->input('product_category'))->value('cat_id'),
                'product_seller_id'=>seller::where('seller_name',$request->input('product_seller'))->value('seller_id'),
                ]);

         return redirect('admin');
        

        
    }


    /**
     * Handle the incoming id to delete that product from db.
     *
     * @param  $id of the product
     * @return deleted the product details correspondence to that id
     */
    
    public function delete_product($id){
         product::where('id',$id)
              ->delete();

         return redirect('admin');
    }

}
