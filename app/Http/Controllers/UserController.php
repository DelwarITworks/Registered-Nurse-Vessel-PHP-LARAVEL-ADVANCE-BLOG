<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$user = Userdetail::findorFail(Auth::id());
    	return view('admin.profile');
    }
}
