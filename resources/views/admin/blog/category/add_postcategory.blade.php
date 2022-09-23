@extends('admin.layouts.app')
@section('title','Add Service')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>All Element for Service</h5>
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
                    <form action="{{ URL::to('add_service') }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Title</label>
                            <div class="col-sm-10"><input type="text" name="title" class="form-control"><span class="form-text m-b-none">Enter a Title..</span></div> 
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Slug</label>
                            <div class="col-sm-4"><input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-sm-2 col-form-label text-right">Icon</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="icon">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Description</label>
                           <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" id="editor"></textarea>
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
                                <button class="btn btn-primary btn-sm" type="submit">Save Service Information</button>
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
	
    function productPhoto1(input) {
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
