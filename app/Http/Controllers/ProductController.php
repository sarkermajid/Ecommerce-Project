<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{


    
    public function index()
    {
        $products = Product::paginate(3);
        return view('/products',compact('products'));
   
    }



    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->has('name')? $request->get('name'):'';
        $product->price = $request->has('price')? $request->get('price'):'';
        $product->amount = $request->has('amount')? $request->get('amount'):'';
        $product->details = $request->has('details')? $request->get('details'):'';
        $product->is_active = 1;

        $category = new Category();
        $category->category_name = $request->has('category_name')? $request->get('category_name'):'';

        if($request->hasFile('images'))
        {
            $files = $request->file('images');

            $imageLocation = array();
            $i=0;
            foreach ($files as $file)
            {
                $extension = $file->getClientOriginalExtension();
                $filename = 'product_'. time() . ++$i . '.' . $extension;
                $location = '/images/uploads/';
                $file->move( public_path() . $location , $filename);
                $imageLocation[] = $location . $filename;
            }
            $product->image = implode('|',$imageLocation);
            $product->save();
            $category->save();
            return back()->with('success', 'Product Successfully Saved!');
        }else{
            return redirect()->back()->with('error', 'Product Was Not Successfully Saved!');
        }
            
    }



    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->has('name')? $request->get('name'):'';
        $product->price = $request->has('price')? $request->get('price'):'';
        $product->amount = $request->has('amount')? $request->get('amount'):'';
        $product->is_active = 1;

        if($request->hasFile('images')){
            $files = $request->file('images');

            $destination = '/images/uploads/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $imageLocation = array();
            $i=0;
            foreach ($files as $file)
            {
                $extension = $file->getClientOriginalExtension();
                $filename = 'product_'. time() . ++$i . '.' . $extension;
                $location = '/images/uploads/';
                $file->move( public_path() . $location , $filename);
                $imageLocation[] = $location . $filename;
            }
            $product->image = implode('|',$imageLocation);
        }
        $product->update();
        return back()->with('update', 'Product Successfully Updated!');
    }



    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('delete','Product Has been Deleted');
    }



    public function addProduct()
    {
        $products = Product::all();
        $categorys = Category::all();
        $returnProducts = array();

        foreach ($products as $product)
        {
            $images = explode('|', $product->image);
            $returnProducts[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'amount' => $product->amount,
                'details' => $product->details,
                'image' => $images[0]
            ];
        }

        $returnCategorys = array();
        foreach ($categorys as $category)
        {
            $returnCategorys[] = [
                'category_name' => $category->category_name,
            ];
        }

        return view('add_product',compact('returnProducts','returnCategorys'));
    }



    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('edit_product',compact('product'));
    }



    public function show(Product $product)
    {
        $images = explode('|', $product->image);
        $related_products = Product::where('category_id', $product->category_id)->where('id','!=',$product->id)->limit(3)->get();
        return view('product_details',compact('product','images', 'related_products'));
    }



    public function addToCart(Request $request)
    {
        $id = $request->has('id')? $request->get('id'):'';
        $name = $request->has('name')? $request->get('name'):'';
        $price = $request->has('price')? $request->get('price'):'';
        $quantity = $request->has('quantity')? $request->get('quantity'):'';
        $size = $request->has('size')? $request->get('size'):'';

        $images = Product::find($id)->image;
        $image = explode('|', $images)[0];

        $cart = Cart::content()->where('id',$id)->first();

        if(isset($cart) && $cart!=null)
        {
            $quantity = ((int)$quantity + (int)$cart->qty);
            $total = ((int)$quantity * (int)$price);
            Cart::update($cart->rowId, ['qty'=>$quantity, 'options' => ['size'=>$size,'image'=>$image,'total'=>$total]]);
        }else{
            $total = ((int)$quantity * (int)$price);
            Cart::add($id,$name,$quantity,$price,['size'=>$size,'image'=>$image,'total'=>$total]);
        }

        return redirect('/products')->with('success','Product Added To Your Cart Successfully!');
    }



    public function viewCart()
    {
        $carts = Cart::content();
        $subTotal = Cart::subtotal();
        return view('cart',compact('carts','subTotal'));
    }



    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart')->with('success','Product Remove Successfully!');
    }



    public function home()
    {
        $featured_products = Product::orderBy('price', 'desc')->limit(4)->get();
        $latest_products = Product::orderBy('created_at', 'desc')->limit(2)->get();
        return view('welcome', compact('featured_products','latest_products'));
    }

    public function validateAmount(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        $product_amount = Product::find($id)->amount;

        if($request->has('qty') && $request->get('qty') > $product_amount){
            return json_encode([
                'success' => true,
                'message' => 'Product quantity must be less than '. $product_amount
            ]);
        }else{
            return json_encode([
                'success'=> false,
            ]);
        }
    }

}