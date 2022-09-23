@extends('layouts.app')
@section('content')
    <main class="about-page">
        <div class="container">
            
            <h1 class="oleez-page-title wow fadeInUp">About</h1>
        
            <div class="row">
                <div class="col-sm-5 col-md-5">
                    <img src="@if($about) {{ asset('storage/app/public/'.$about->image) }} @endif" alt="about" class="w-100 wow fadeInUp" height="400px" width="200px">
                </div>
                <div class="col-sm-7 col-md-7">
                    <p class="oleez-page-header-content wow fadeInUp">@if($about){!! $about->meta_description !!}@endif</p>
               
                </div>
                <section class="oleez-what-we-do">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <p>@if($about){!! $about->description !!}@endif</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection