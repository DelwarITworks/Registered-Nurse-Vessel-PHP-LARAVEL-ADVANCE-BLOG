<?php

namespace App\Http\Controllers;

use App\Models\Galary;
use Illuminate\Http\Request;

class GalaryController extends Controller
{
     public function index()
    {
        $activegalaries = Galary::where('status',1)->latest()->get();

        $deactivegalaries = Galary::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.galary.all_galary',compact('activegalaries','deactivegalaries','count'));
    }

    // public function activeList()
    // {
    //     $count = 1;
    //     return view('admin.galary.activelist',compact('galaries','count'));
    // }

    // public function deactiveList()
    // {
    //     $count = 1;
    //     return view('admin.galary.deactivelist',compact('galaries','count'));
    // }

    public function create()
    {
        return view('admin.galary.add_galary');
    }

    public function store()
    {
        $galary = Galary::create($this->validateData());
        $this->storeImage($galary);

        if ($galary) {
            $notification = array(
                'messege' => 'New Galary Added Successfully!',
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

    public function edit(Galary $galary)
    {
        return view('admin.galary.edit_galary',compact('galary'));
    }

    public function update(Galary $galary)
    {
        $galary->update($this->validateUpdateData());
        $this->storeUpdateImage($galary);

        if ($galary) {
            $notification = array(
                'messege' => 'Galary Photo Updated!',
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

    public function active(Galary $galary)
    {
        $galary->update(['status' => 1]);
        if ($galary) {
            $notification = array(
                'messege' => 'Galary Activated!',
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

    public function deactive(Galary $galary)
    {
        $galary->update(['status' => 0]);
        if ($galary) {
            $notification = array(
                'messege' => 'Galary Deactivated!',
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

    public function destroy(Galary $galary)
    {
        if($galary->image){
            unlink('storage/app/public/'.$galary->image);
        }
        $galary->delete();
        if ($galary) {
            $notification = array(
                'messege' => 'Blog Galary Deleted Permanently!',
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
            'title' => 'required',
            'image' => 'required',
        ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'title' => 'required',
            'image' => '',
        ]);
    }

    private function storeImage($galary)
    {
        if(request()->has('image')){
            $galary->update([
                'image' => request()->image->store('image/galaries','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$galary->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($galary)
    {
        if(request()->has('image')){
            
            $galary->update([
                'image' => request()->image->store('image/galaries','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }
            // $resize = Image::make('storage/app/public/'.$galary->image)->resize(300,300);
            // $resize->save();
        }
    }
}
