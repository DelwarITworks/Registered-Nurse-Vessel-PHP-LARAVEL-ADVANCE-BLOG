@extends('admin.layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">Category List <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#newCategory">New Category</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            @if($category->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td class="center">
                            <a href="{{ route('edit.category',$category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            @if($category->status == 1)
                                <a href="{{ route('deactive.category',$category->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-thumbs-down"></i></a>
                            @else
                                <a href="{{ route('active.category',$category->id) }}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i></a>
                            @endif
                            <a href="{{ route('delete.category',$category->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- New Category MODAL -->
<div id="newCategory" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center rounded-0" role="document">
    <div class="modal-content rounded-0 bd-0 tx-14">
    <form action="{{ route('store.category') }}" method="POST">
        @csrf
      <div class="modal-header pd-y-20 pd-x-25">
        <h4 class="">New Category</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Category Name" value="{{ old('name') }}" required="">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Enter URL Slug" value="{{ old('slug') }}" required="">
            @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info rounded-0">Save Category</button>
        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>



@endsection

<script>
    //Hidding Button
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }

</script>

