<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use Image;
use File;

class ProductController extends Controller
{
    public function add()
    {
        return view("backend.product.addproduct");
    }
    public function store(Request $request)
    {
        $request->validate([
            'pro_title' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'pic' => 'required',
            'pro_price' => 'required',
            'status' => 'required',
        ]);

        if($request->pic){

            $image = $request->file("pic");
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path("backend\productimg\\".$customName);
            Image::make($image)->save($location);
        }

        $product = new Product;

        $product->pro_title = $request->pro_title;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->pro_price = $request->pro_price;
        $product->status  = $request->status;
        $product->pic  =  $customName;

        $product->save();
        return redirect()->route("product.show")->with("message","Product Added Successfully");
    }

    public function show()
    {
        $allproduct= Product::all();
        return view("backend.product.manageproduct",compact("allproduct"));
    }

    public function delete($id)
    {
        $product= Product::find($id);
        if(File::exists("backend/productimg/".$product->pic)){
            File::delete("backend/productimg/".$product->pic);
        }
        $product->delete();
        return redirect()->route("product.show")->with("message","Product Deleted Successfully");
    }

    public function edit($id)
    {
        $product= Product::find($id);
        return view('backend.product.editproduct',compact("product"));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if($request->pic){
            if(File::exists("backend/productimg/".$product->pic)){
                File::delete("backend/productimg/".$product->pic);
            }

            $image = $request->file("pic");
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path("backend\productimg\\".$customName);
            Image::make($image)->save($location);

            $product->pro_title = $request->pro_title;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->description = $request->description;
            $product->pro_price = $request->pro_price;
            $product->status  = $request->status;
            $product->pic  =  $customName;

            $product->update();
            return redirect()->route("product.show")->with("message","Product Updated Successfully");
        }
        else{
            $product->pro_title = $request->pro_title;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->description = $request->description;
            $product->pro_price = $request->pro_price;
            $product->status  = $request->status;

            $product->update();
            return redirect()->route("product.show")->with("message","Product Updated Successfully");
        }
    }


    public function status($id){
        $status = Product::find($id);
        if($status->status==1){
            $status->status = 0;
        }
        else{
            $status->status = 1;
        }
        $status->update();
        return redirect()->route("product.show")->with("message","Status Updated Successfully");
    }

}
