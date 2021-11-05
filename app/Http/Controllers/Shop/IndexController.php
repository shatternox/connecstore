<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $product = Product::all();
        $category = Category::all();
        $subCat = SubCategory::all();

        return view('shop.index',compact('product', 'category','subCat'));
    }
    public function detail(Request $request){
        $product = Product::all();
        $category = Category::all();
        $subCat = SubCategory::all();
        $selectedProduct = Product::where('id',$request->ProductID)->get()->first();
        // dd($selectedProduct);
        // dd($request->ProductID);
        return view('shop.detail',compact('product', 'category','subCat'));
    }


    public function UserLogout(){

        Auth::logout();
        return Redirect()->route('login');


    }


    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('shop.profile.user_profile', compact('user'));
    }   

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            
            $filename = hexdec(uniqid());
            $extension = strtolower($file->getClientOriginalExtension());
            $complete_file_name = $filename.'.'.$extension;

            @unlink(public_path('upload/profile_images/'. $data->profile_photo_path));

            $file->move(public_path('upload/profile_images'), $complete_file_name);
            $data['profile_photo_path'] = $complete_file_name;
        }    
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('shop.profile.change_password', compact('user'));
    }

    public function UserUpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id() );
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    }
}
