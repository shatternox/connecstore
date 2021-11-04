<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('admin.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request){
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
        ],
        [
            'category_name.required' => 'Please input category name',
            'category_icon.required' => 'Please input the category icon'
        ]


        );

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request, $id){
        $request->validate([
                'category_name' => 'required',
            ],
            [
                'category_name.required' => 'Please input the new category name',
            ]


        );

        /**
         * Bisa juga gini but gw gk suka
         * 
         * Category::findOrFail($id)->update([
         *      'category_name' => $request->category_name,
         *      'category_icon' => $request->category_icon,
         * ]);
         */

        $category = Category::findOrFail($id);

        $category->category_name = $request->category_name;
        $category->category_icon = $request->category_icon;
    
        $category->save();


        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){

        // Category::findOrFail($id)->delete(); oneliner
        $category = Category::findOrFail($id);
        $category->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }
}
