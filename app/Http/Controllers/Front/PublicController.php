<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Post;
use App\Models\Front\Contact;
use App\Models\Postcategory;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function about()
    {
    	$about = About::first();
    	return view('about' ,compact('about'));
    }
    public function singlePost($slug)
    {
    	$post = Post::where('slug',$slug)->first();
        $postcategories = Post::inRandomOrder()->limit(5)->get();
    	return view('blog.single_post',compact('post','postcategories'));
    }
    public function catePost($postcate)
    {
        $postcates = Postcategory::where('slug',$postcate)->first();
        $posts = $postcates->post()->latest()->get();
        return view('blog.category_post',compact('posts','postcates'));
    }


    public function contact()
    {
        return view('contact');
    }

    public function contactStore()
    {
        $post = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $contact = Contact::create($post);

        if($contact) {
            $notification = array(
                'messege' => 'Your Message Send Successfully! Wait for the response!! Thank You..',
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
    public function search(Request $request)
    {
        $search = $request->input('search');
        $searchData = Post::where('title','LIKE', "%$search%")->orwhere('body','LIKE', "%$search%")->latest()->paginate(12);
         return view('search',compact('search','searchData'));
    }
}
