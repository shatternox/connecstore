<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('admin.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request){

        $request->validate([
                'brand_name' => 'required',
                'brand_image' => 'required',
            ],
            [
                'brand_name.required' => 'Please input the brand name',
                'brand_image.required' => 'Brand needs image'
            ]
    
    
        );

        $image = $request->file('brand_image');
        $image_name = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'. $image_name);
        $image_path = 'upload/brand/'. $image_name;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            'brand_image' => $image_path,
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id){

        $brand = Brand::findOrFail($id);
        return view('admin.brand.brand_edit', compact('brand'));

    }

    public function BrandUpdate(Request $request, $id){

        $request->validate([
            'brand_name' => 'required',
        ],
        [
            'brand_name.required' => 'Please input the new brand name',
        ]


    );

        $brand = Brand::findOrFail($id);
        $brand->brand_name = $request->brand_name;

        if($request->file('brand_image')){
            $image = $request->file('brand_image');
            $image_name = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'. $image_name);
            $image_path = 'upload/brand/'. $image_name;
            @unlink($brand->brand_image);

            $brand->brand_image = $image_path;
        }

        $brand->save();


        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.brand')->with($notification);

    }

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        @unlink($brand->brand_image);

        $brand->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

}
