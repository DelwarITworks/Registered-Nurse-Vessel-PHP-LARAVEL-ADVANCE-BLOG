<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function admin()
    {
    	$admins= User::where('is_admin',1)->get();
    	$count = 1;
    	return view('admin.admin.admin',compact('admins','count'));
    }
    public function demoteAdmin(User $admin)
    {
    	$admin->update(['is_admin' => 0 ]);

        if ($admin) {
            $notification = array(
                'messege' => 'Admin Demoted!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
