@extends('admin.layouts.app')


@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit {{ $category->name }}'s Information <a href="{{ route('all.categories') }}" class="btn btn-sm btn-primary float-right">All categorys</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.category',$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" placeholder="enter category name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="">URL Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}" placeholder="enter url slug">
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update Category</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

