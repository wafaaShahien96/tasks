<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TagProduct;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index' ,compact('products'));
    }

    public function create()
    {
        $tages=Tag::all();

        $categories = Category::where('parent_id' , null)->get();
        return view('admin.product.create',compact('categories','tages'));
    }

    public function store(StoreProductRequest $request)
    {
    $data = $request->all();
    unset($data['tag_id']);


    if ($request->hasFile('image')) {

        $newImage = Image::make($request->image)->encode('jpeg');
        Storage::disk('local')->put('public/images/product/' . $request->image->hashName(), (string)$newImage,'public');

        $data['image'] = $request->image->hashName();
    }

    $product = Product::create($data);

    foreach(request('tag_id') as $tag)
    {
        TagProduct::create(['tag_id'=>$tag ,'product_id'=>$product->id]);
    }
        return redirect()->route('products.index')->with('success' , 'Product has Created Successfully');
    }

    public function edit($id)
    {
        $tages=Tag::all();

        $product = Product::find($id);
        // return $product;
        $categories = Category::where('parent_id' , null)->get();
        return view('admin.product.edit' ,compact('product','categories','tages'));
    }

    public function update(UpdateProductRequest $request ,$id)
    {
        $product = Product::find($id);

        $data = $request->all();

        unset($data['tag_id']);
        // foreach(request('tag_id') as $tag)
        // {
        //     TagProduct::create(['tag_id'=>$tag ,'product_id'=>$product->id]);
        // }

          if ($request->hasFile('image')) {

            $newImage = Image::make($request->image)->encode('jpeg');
            Storage::disk('local')->put('public/images/product/' . $request->image->hashName(), (string)$newImage,'public');

            $data['image'] = $request->image->hashName();
        }
    

        $product->update($data);


            return redirect()->route('products.index')->with('success' , 'product has Updated Successfully');
   }

     public function destroy($id)
    {
        $product=Product::where('id',$id)->delete();
        $product->delete();
        return back()->with('success' , 'product has deleted Successfully');

    }

}
