@extends('admin.layouts.app')
@section('title','Add about')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Add new about</h3>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>All Element for About</h5>
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
                    @if(!$about)
                    <form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Image</label>
                            <div class="col-sm-4"><input type="file" onchange="photoChange(this)"  class="form-control  @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <img src="" id="productphoto1" class="img-thumbnail" height="100px" width="auto" alt="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Meta Description</label>
                           <div class="col-sm-10">
                                <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ old('meta_description') }}" id="summary-ckeditor"></textarea>
                            @error('meta_description')
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
                                <button class="btn btn-primary btn-sm" type="submit">Save About Information</button>
                            </div>
                        </div>
                    </form>
                    @else

                    <form action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Image</label>
                            <div class="col-sm-4"><input type="file" onchange="photoChange(this)"  class="form-control  @error('image') is-invalid @enderror" name="image">
                                <input type="hidden" name="old_image" value="{{ $about->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('/storage/app/public/'.$about->image) }}" id="productphoto1" class="img-thumbnail" height="100px" width="auto" alt="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Meta Description</label>
                           <div class="col-sm-10">
                                <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ old('meta_description') }}" id="summary-ckeditor">{{ $about->meta_description }}</textarea>
                            @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Description</label>
                           <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" id="summary-ckeditor1">{{ $about->description }}</textarea>
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
                                <button class="btn btn-primary btn-sm" type="submit">Save About Information</button>
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
                $('#productphoto1')
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
