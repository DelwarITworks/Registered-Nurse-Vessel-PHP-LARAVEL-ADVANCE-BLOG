@extends('admin.layouts.app')
@section('title','All Galary')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">All Galaries <a href="{{ route('add.galary') }}" class="btn btn-sm btn-primary float-right">Add New galary</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Active all galarys</h5>
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

                    <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th width="15%">SL</th>
                    <th>Title </th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($activegalaries as $galary)
                <tr class="gradeX">
                    <td>{{ $count++ }}</td>
                    <td>{{ $galary->title }}</td>
                    <td>
                        <img src="{{ asset('storage/app/public/'.$galary->image) }}" height="60px" width="auto" alt="">
                    </td>                    <td>
                        <a href="{{ url('/edit_galary/'.$galary->id) }}" class="btn btn-success btn-xs">Edit</a> 
                        @if($galary->status == 1)
                            <a href="{{ route('deactive.galary',$galary->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-thumbs-down"></i></a>
                        @else
                            <a href="{{ route('active.galary',$galary->id) }}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i></a>
                        @endif
                        <a href="{{ url('/delete_galary/'.$galary->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th width="15%">SL</th>
                    <th>Title </th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>De-active all galarys</h5>
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

                    <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th width="15%">SL</th>
                    <th>Title </th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($deactivegalaries as $galary)
                <tr class="gradeX">
                    <td>{{ $count++ }}</td>
                    <td>{{ $galary->title }}</td>
                    <td>
                        <img src="{{ asset('storage/app/public/'.$galary->image) }}" height="60px" width="auto" alt="">
                    </td>                    <td>
                        <a href="{{ url('/edit_galary/'.$galary->id) }}" class="btn btn-success btn-xs">Edit</a>
                        @if($galary->status == 1)
                            <a href="{{ route('deactive.galary',$galary->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-thumbs-down"></i></a>
                        @else
                            <a href="{{ route('active.galary',$galary->id) }}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i></a>
                        @endif
                        <a href="{{ url('/delete_galary/'.$galary->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th width="15%">SL</th>
                    <th>Title </th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
