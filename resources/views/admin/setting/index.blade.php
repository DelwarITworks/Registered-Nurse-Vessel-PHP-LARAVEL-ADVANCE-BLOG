@extends('admin.layouts.app')
@section('title','Add setting')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Add new setting</h3>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>All Element for setting</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @if(!$setting)
                    <form action="{{ route('store.setting') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Title</label>
                            <div class="col-sm-10"><input type="text" name="website_title" class="form-control  @error('website_title') is-invalid @enderror"><span class="form-text m-b-none">Enter a Name..</span>
                                
                                @error('website_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div>
                        <div class="hr-line-dashed"></div>




                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Email</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('email') is-invalid @enderror" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label class="col-sm-2 col-form-label text-right">Phone</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Header Title</label>
                            <div class="col-sm-10"><input type="text" name="header_title" class="form-control  @error('header_title') is-invalid @enderror"><span class="form-text m-b-none">Enter a Name..</span>
                                
                                @error('header_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group row">
                            
                            <div class="col-sm-4"><label class="col-sm-12 col-form-label">Favicon</label><input type="file" onchange="photoChange(this)"  class="form-control  @error('favicon') is-invalid @enderror" name="favicon">
                                @error('favicon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-sm-12">
                                    <img src="" id="favicon" class="img-thumbnail" height="100px" width="auto" alt="">
                                </div>
                            </div>
                            
                            <div class="col-sm-4"><label class="col-sm-12 col-form-label">Logo</label>
                                <input type="file" onchange="photoChange1(this)"  class="form-control  @error('logo') is-invalid @enderror" name="logo">
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="col-sm-12">
                                <img src="" id="logo" class="img-thumbnail" height="100px" width="auto" alt="">
                            </div>
                        </div>
                            
                            <div class="col-sm-4"><label class="col-sm-12 col-form-label">Header Image</label><input type="file" onchange="photoChange2(this)"  class="form-control  @error('header_logo') is-invalid @enderror" name="header_logo">
                                @error('header_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="col-sm-12">
                                <img src="" id="headerImage" class="img-thumbnail" height="100px" width="auto" alt="">
                            </div>
                        </div>

                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Facebook Link</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('fb_link') is-invalid @enderror" name="fb_link">
                                @error('fb_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label class="col-sm-2 col-form-label text-right">Twitter Link</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('twitter_link') is-invalid @enderror" name="twitter_link">
                                @error('twitter_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Instagram Link</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('instagram_link') is-invalid @enderror" name="instagram_link">
                                @error('instagram_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Address</label>
                            <div class="col-sm-10"><input type="text" class="form-control  @error('address') is-invalid @enderror" name="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>




                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Description</label>
                           <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" id="summary-ckeditor1"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>




                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm" type="submit">Save setting Information</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('update.setting') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Title</label>
                            <div class="col-sm-10"><input type="text" name="website_title" class="form-control  @error('website_title') is-invalid @enderror" value="{{ $setting->website_title }}"><span class="form-text m-b-none">Enter a Name..</span>
                                
                                @error('website_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div>
                        <div class="hr-line-dashed"></div>




                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Email</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $setting->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label class="col-sm-2 col-form-label text-right">Phone</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{ $setting->phone }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Header Title</label>
                            <div class="col-sm-10"><input type="text" name="header_title" class="form-control  @error('header_title') is-invalid @enderror" value="{{ $setting->header_title }}"><span class="form-text m-b-none" >Enter a Name..</span>
                                
                                @error('header_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group row">
                            
                            <div class="col-sm-4"><label class="col-sm-12 col-form-label">Favicon</label><input type="file" onchange="photoChange(this)"  class="form-control  @error('favicon') is-invalid @enderror" name="favicon">
                                <input type="hidden" name="old_favicon" value="{{ $setting->favicon }}">
                                @error('favicon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-sm-12">
                                    <img src="{{ asset('storage/app/public/'.$setting->favicon) }}" id="favicon" class="img-thumbnail" height="100px" width="auto" alt="">
                                </div>
                            </div>
                            
                            <div class="col-sm-4"><label class="col-sm-12 col-form-label">Logo</label>
                                <input type="file" onchange="photoChange1(this)"  class="form-control  @error('logo') is-invalid @enderror" name="logo">
                                <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="col-sm-12">
                                <img src="{{ asset('storage/app/public/'.$setting->logo) }}" id="logo" class="img-thumbnail" height="100px" width="auto" alt="">
                            </div>
                        </div>
                            
                            <div class="col-sm-4"><label class="col-sm-12 col-form-label">Header Image</label><input type="file" onchange="photoChange2(this)"  class="form-control  @error('header_logo') is-invalid @enderror" name="header_logo">
                                <input type="hidden" name="old_header_logo" value="{{ $setting->header_logo }}">
                                @error('header_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="col-sm-12">
                                <img src="{{ asset('storage/app/public/'.$setting->header_logo) }}" id="headerImage" class="img-thumbnail" height="100px" width="auto" alt="">
                            </div>
                        </div>

                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Facebook Link</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('fb_link') is-invalid @enderror" name="fb_link" value="{{ $setting->fb_link }}">
                                @error('fb_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label class="col-sm-2 col-form-label text-right">Twitter Link</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('twitter_link') is-invalid @enderror" name="twitter_link" value="{{ $setting->twitter_link }}">
                                @error('twitter_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Instagram Link</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('instagram_link') is-invalid @enderror" name="instagram_link" value="{{ $setting->instagram_link }}">
                                @error('instagram_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Address</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{ $setting->address }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>




                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Description</label>
                           <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" id="summary-ckeditor1">{{ $setting->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>




                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm" type="submit">Save setting Information</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mainly scripts -->

<script>
    
    function photoChange(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#favicon')
                .attr('src', e.target.result)
                .attr("class","img-thumbnail mb-2")
                .attr("height",'180px')
                .attr("width",'180px')
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function photoChange1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#logo')
                .attr('src', e.target.result)
                .attr("class","img-thumbnail mb-2")
                .attr("height",'180px')
                .attr("width",'180px')
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function photoChange2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#headerImage')
                .attr('src', e.target.result)
                .attr("class","img-thumbnail mb-2")
                .attr("height",'180px')
                .attr("width",'180px')
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
