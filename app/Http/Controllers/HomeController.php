<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\About;
use App\User;
use App\Models\Postcategory;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postcategories = Postcategory::all();
        $posts =Post::latest()->paginate(20);
        $setting= Setting::first();
        return view('home',compact('setting','posts','postcategories'));
    }
    public function admin()
    {
        $posts =Post::all();
        $postcategories =Postcategory::all();
        $admins = User::where('is_admin' ,1)->get();
        $users = User::where('is_admin' ,null)->get();
        return view('admin.index' ,compact('posts','postcategories','admins','users'));
    }
}
