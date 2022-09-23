<?php

namespace App\Http\Controllers;

use App\Models\Postcategory;
use Illuminate\Http\Request;

class PostcategoryController extends Controller
{
    public function index()
    {
        $categories = Postcategory::all();
        $count = 1;
        return view('admin.blog.category.index',compact('categories','count'));
    }

    public function store()
    {
        $category = Postcategory::create($this->validateData());

        if ($category) {
            $notification = array(
                'messege' => 'New Postcategory Added Successfully!',
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

    public function edit(Postcategory $category)
    {
        return view('admin.blog.category.edit',compact('category'));
    }

    public function update(Postcategory $category)
    {
        $category->update($this->validateUpdateData());
        if ($category) {
            $notification = array(
                'messege' => 'Category Updated Successfully!',
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

    public function active(Postcategory $category)
    {
        $category->update(['status' => 1 ]);
        if ($category) {
            $notification = array(
                'messege' => 'Postcategory Activated!',
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

    public function deactive(Postcategory $category)
    {
        $category->update(['status' => 0 ]);
        if ($category) {
            $notification = array(
                'messege' => 'Postcategory Deactivated!',
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

    public function delete(Postcategory $category)
    {
        $category->delete();
        if ($category) {
            $notification = array(
                'messege' => 'Postcategory Permanently Deleted!',
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

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:postcategories',
        ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
    }

}
