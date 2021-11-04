<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function ProductAdd(){

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();


        return view('admin.product.product_add', compact('categories', 'brands'));

    }

    public function ProductStore(Request $request){


        $image = $request->file('product_thumbnail');
        $image_name = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/thumbnail/'. $image_name);
        $image_path = 'upload/product/thumbnail/'. $image_name;
        
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'discount' => $request->discount,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'product_thumbnail' => $image_path,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);


        /// Multiple Image, beda database
        $images = $request->file('image_name');
        foreach ($images as $img) {
            $image_names = hexdec(uniqid()). '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/product/multi_image/'. $image_names);
            $image_paths = 'upload/product/multi_image/'. $image_names;

            MultiImg::insert([
                'product_id' => $product_id,
                'image_name' => $image_paths,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.product')->with($notification);
    }

    public function ProductManage(){

        $products = Product::latest()->get(); 

        return view('admin.product.product_view', compact('products'));

    }


    public function ProductEdit($id){

        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $images = MultiImg::where('product_id', $id)->get();

        return view('admin.product.product_edit', compact('product', 'brands', 'categories', 'subcategories', 'images'));

    }

    public function ProductUpdate(Request $request, $id){


        $product_id = Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'discount' => $request->discount,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.product')->with($notification);

    }

    public function ProductUpdateImages(Request $request){

        $images = $request->image_name;

        // dict, key, value
        foreach ($images as $id => $image) {
            
            $del_image = MultiImg::findOrFail($id);
            @unlink($del_image->image_name);
            $image_name = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/product/multi_image/'. $image_name);
            $image_path = 'upload/product/multi_image/'. $image_name;

            MultiImg::where('id', $id)->update([
                'image_name' => $image_path,
                'updated_at' => Carbon::now(),
            ]);


        }

        $notification = array(
            'message' => 'Product Images Edited Successfully',
            'alert-type' => 'info'
        );
        

        return redirect()->back()->with($notification);
    }

    public function ProductUpdateThumbnail(Request $request, $id){
        
        $product = Product::findOrFail($id);

        
        $image = $request->file('product_thumbnail');

        $image_name = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/thumbnail/'. $image_name);
        $image_path = 'upload/product/thumbnail/'. $image_name;

        @unlink($product->product_thumbnail);

        $product->update([
            "product_thumbnail" => $image_path,
        ]);

        $notification = array(
            'message' => 'Product Thumbnail Edited Successfully',
            'alert-type' => 'info'
        );
        

        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        @unlink($product->product_thumbnail);
        $product->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $image) {
            @unlink($image->image_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductDeleteImages($id){
        $images = MultiImg::findOrFail($id);
        @unlink($images->image_name);

        $images->delete();

        $notification = array(
            'message' => 'Product Images Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductActive($id){

        $product = Product::findOrFail($id);
        $product->update([
            "status" => 1,
        ]);

        return redirect()->back();
    }

    public function ProductInactive($id){

        $product = Product::findOrFail($id);
        $product->update([
            "status" => 0,
        ]);

        return redirect()->back();

    }


}
