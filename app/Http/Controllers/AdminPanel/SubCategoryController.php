<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;


class SubCategoryController extends Controller
{
    
    public function SubCategoryView(){

        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.category.subcategory_view', compact('subcategories', 'categories'));

    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ],
        [
            'category_id.required' => 'Please select main category from the options',
            'subcategory_name.required' => 'Please input the sub category name',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'Sub Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subcategory_edit', compact('subcategory', 'categories'));
    }

    public function SubCategoryUpdate(Request $request, $id){
        $request->validate([
                'subcategory_name' => 'required',
            ],
            [
                'subcategory_name.required' => 'Please input the new sub category name',
            ]


        );


        $subcategory = SubCategory::findOrFail($id);

        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
    
        $subcategory->save();


        $notification = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){

        // Category::findOrFail($id)->delete(); oneliner
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        $notification = array(
            'message' => 'Sub Category Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcat);
    }



}
