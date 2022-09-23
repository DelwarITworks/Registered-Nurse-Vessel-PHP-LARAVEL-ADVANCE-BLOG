@extends('admin.layouts.app')
@section('title','Add Teacher')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Add new Teacher <a href="{{ route('all.teachers') }}" class="btn btn-sm btn-primary float-right">All Teacher List</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>All Element for Teacher</h5>
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
                    <form action="{{ route('update.post',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Title</label>
                            <div class="col-sm-10"><input type="text" name="title" value="{{ $post->title }}" class="form-control  @error('title') is-invalid @enderror"><span class="form-text m-b-none">Enter a Name..</span>
                                
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Slug</label>
                            <div class="col-sm-4"><input type="text" value="{{ $post->slug }}" class="form-control  @error('slug') is-invalid @enderror" name="slug">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-sm-2 col-form-label text-right">Category</label>
                            <div class="col-sm-4"><select type="text" class="form-control  @error('postcategory_id') is-invalid @enderror" name="postcategory_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $post->postcategory_id) selected @endif> {{ $category->name }}</option>
                                @endforeach

                            </select>
                                @error('postcategory_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Image</label>
                            <div class="col-sm-4"><input type="file" onchange="photoChange(this)"  class="form-control" name="image">
                                <input type="hidden" name="old_image" value="{{ $post->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('storage/app/public/'.$post->image) }}" id="productphoto1" class="img-thumbnail" height="50px" width="auto" alt="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Post Body</label>
                           <div class="col-sm-10">
                                <textarea class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" id="editor">{{ $post->body }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>




                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm" type="submit">Save Teacher Information</button>
                            </div>
                        </div>
                    </form>
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
