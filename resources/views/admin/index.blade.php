@extends('admin.layouts.app')

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
       <div class="col-lg-3">
	        <div class="ibox ">
	            <div class="ibox-title">
	                <span class="label label-success float-right">Total </span>
	                <h5>Posts</h5>
	            </div>
	            <div class="ibox-content">
	                <h1 class="no-margins">{{ count($posts) }}</h1>
	                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
	                <small>All Time</small>
	            </div>
	        </div>
	    </div>
       <div class="col-lg-3">
	        <div class="ibox ">
	            <div class="ibox-title">
	                <span class="label label-success float-right">Total </span>
	                <h5>Admin</h5>
	            </div>
	            <div class="ibox-content">
	                <h1 class="no-margins">{{ count($admins) }}</h1>
	                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
	                <small>All Time</small>
	            </div>
	        </div>
	    </div>
       <div class="col-lg-3">
	        <div class="ibox ">
	            <div class="ibox-title">
	                <span class="label label-success float-right">Total </span>
	                <h5>Users</h5>
	            </div>
	            <div class="ibox-content">
	                <h1 class="no-margins">{{ count($users) }}</h1>
	                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
	                <small>All Time</small>
	            </div>
	        </div>
	    </div>
       <div class="col-lg-3">
	        <div class="ibox ">
	            <div class="ibox-title">
	                <span class="label label-success float-right">Total </span>
	                <h5>Post Categories</h5>
	            </div>
	            <div class="ibox-content">
	                <h1 class="no-margins">{{ count($postcategories) }}</h1>
	                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
	                <small>All Time</small>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection