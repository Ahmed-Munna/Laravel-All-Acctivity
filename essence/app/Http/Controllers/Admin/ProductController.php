<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class ProductController extends Controller
{
    // start all product

    public function index() {
        $products = Product::latest()->get();
        return view('admin.products.all-product', compact('products'));
    }

    public function addProduct() {
        $categorys = Category::latest()->get();
        $subCategorys = SubCategory::latest()->get();
        return view('admin.products.add-product', compact('categorys', 'subCategorys'));
    }

    public function storeProduct(Request $request) {

        $request->validate([
            'ProductName' => 'required|max:255',
            'ProductPrice' => 'required|integer',
            'ShortDiscription' => 'required|max:300',
            'LongDiscription' => 'required',
            'CatId' => 'required',
            'SubCatId' => 'required',
            'ProductImg' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $productName = time().'.'.$request->ProductImg->extension();
        $request->ProductImg->move(public_path('upload'), $productName);
        $productUrl = 'upload/'.$productName;


        Product::insert([
            'prouct_name' => $request->ProductName,
            'product_short_dis' => $request->ShortDiscription,
            'product_long_dis' => $request->ShortDiscription,
            'price' => $request->ProductPrice,
            'product_category_id' => $request->CatId,
            'product_subtegory_id' => $request->SubCatId,
            'quantity' => $request->ProductQuantity,
            'product_slug' => Str::of($request->ProductName)->slug('-'),
            'product_img' => $productUrl
        ]);

        Category::where('id',$request->CatId)->increment('product_count',1);
        SubCategory::where('id',$request->SubCatId)->increment('product_count',1);

        return back()->with('massege','Product added successful');
    }

    public function editProduct($id) {
        $data = Product::find($id);
        return view('admin.products.update-product', compact('data'));
    }

    public function updateProduct(Request $request) {

        $request->validate([
            'ProductName' => 'required|max:255',
            'ProductPrice' => 'required|integer',
            'ShortDiscription' => 'required|max:300',
            'LongDiscription' => 'required',
            'ProductImg' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if(filled($request->ProductImg)) {

            $productName = time().'.'.$request->ProductImg->extension();
            $request->ProductImg->move(public_path('upload'), $productName);
            $productUrl = 'upload/'.$productName;

            File::delete($request->product_img);
            Product::find($request->productID)->update([
                'product_img' => $productUrl
            ]);

        }else{

            unset($request->ProductImg);

        }

        Product::find($request->productID)->update([
            'prouct_name' => $request->ProductName,
            'product_short_dis' => $request->ShortDiscription,
            'product_long_dis' => $request->ShortDiscription,
            'price' => $request->ProductPrice,
            'quantity' => $request->ProductQuantity,
            'product_slug' => Str::of($request->ProductName)->slug('-'),
        ]);

        return redirect()->route('all-product')->with('massege', 'Product Updated successful');


    }

    public function deleteProduct($id) {
        Category::where('id',$id)->decrement('product_count',1);
        SubCategory::where('id',$id)->decrement('product_count',1);
        Product::where('id',$id)->delete();
        return back()->with('massege', 'Product Deleted Successfull');
    }

}
