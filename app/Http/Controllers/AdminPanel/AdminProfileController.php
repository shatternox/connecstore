<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{

    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminProfile(){

        $admin = Admin::find(1);

        return view('admin.admin_profile_view', compact('admin'));

    }

    public function AdminProfileEdit(){
        $edit = Admin::find(1);

        return view('admin.admin_profile_edit', compact('edit'));
    }

    public function AdminProfileStore(Request $request){

        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

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

        return redirect()->route('admin.profile')->with($notification);

    }

    public function AdminChangePassword(){

        return view('admin.admin_change_password');
    }

    public function AdminUpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Admin::find(1)->password;

        if(Hash::check($request->oldpassword, $hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }

    }

}
