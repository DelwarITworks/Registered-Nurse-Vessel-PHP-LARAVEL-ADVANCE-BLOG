@php
 $setting = App\Models\Setting::first();    
 $postcategories = App\Models\Postcategory::where('status',1)->get();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('public/front/assets/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/assets/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/assets/css/toastr.min.css') }}">
    <script src="{{ asset('public/front/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/front/assets/js/loader.js') }}"></script>
</head>

<body>
    <div class="oleez-loader"></div>
    <header class="oleez-header" style=" box-shadow: 0 5px 5px 0 lightgray;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('/') }}"><h2 class="font-weight-bold text-info">@if($setting) {{ $setting->website_title }} @endif</h2></a>
            <ul class="nav nav-actions d-lg-none ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#!" data-toggle="searchModal">
                        <img src="{{ asset('public/front/assets/images/search.svg') }}" alt="search">
                    </a>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a class="nav-link dropdown-toggle" href="#!" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('home.lang')</a>
                    <div class="dropdown-menu" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="locale/en">ENGLISH</a>
                        <a class="dropdown-item" href="locale/bn">বাংলা</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!" data-toggle="offCanvasMenu">
                        <img src="{{ asset('public/front/assets/images/social icon@2x.svg') }}" alt="social-nav-toggle">
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav" aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="oleezMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('/') }}">@lang('home.home') <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('home.posts')</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            @foreach($postcategories as $postcategory)
                            <a class="dropdown-item" href="{{ route('category.post',$postcategory->slug) }}">{{ $postcategory->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">@lang('home.about')</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">@lang('home.contact')</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item active">
                        <a class="nav-link nav-link-btn" href="#!" data-toggle="searchModal">
                            <img src="{{ asset('public/front/assets/images/search.svg') }}" alt="search">
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#!" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('home.lang')</a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" href="locale/en">ENGLISH</a>
                            <a class="dropdown-item" href="locale/bn">বাংলা</a>
                        </div>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link pr-0 nav-link-btn" href="#!" data-toggle="offCanvasMenu">
                            <img src="{{ asset('public/front/assets/images/social icon@2x.svg') }}" alt="social-nav-toggle">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @yield('content')



    <footer class="oleez-footer wow fadeInUp">
            <div class="container">
                <div class="footer-content">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>@if($setting) {{ $setting->website_title }} @endif</h3>
                            <p class="footer-intro-text">@if($setting) {!! $setting->description !!} @endif</p>
                            <nav class="footer-social-links">
                                <a href="@if($setting) {{ $setting->fb_link }} @else # @endif">Fb</a>
                                <a href="@if($setting) {{ $setting->twitter_link }} @else # @endif">Tw</a>
                                <a href="@if($setting) {{ $setting->instagram_link }} @else # @endif">In</a>
                                <a href="@if($setting) tel:{{ $setting->phone }} @else # @endif">Pn</a>
                            </nav>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 footer-widget-text">
                                    <h6 class="widget-title">@lang('home.phone')</h6>
                                    <p class="widget-content">@if($setting) {{ $setting->phone }} @endif</p>
                                </div>
                                <div class="col-md-6 footer-widget-text">
                                    <h6 class="widget-title">@lang('home.email')</h6>
                                    <p class="widget-content">@if($setting) {{ $setting->email }} @endif</p>
                                </div>
                                <div class="col-md-6 footer-widget-text">
                                    <h6 class="widget-title">@lang('home.address')</h6>
                                    <p class="widget-content">@if($setting) {{ $setting->address }} @endif</p>
                                </div>
                                <div class="col-md-6 footer-widget-text">
                                    <h6 class="widget-title">@lang('home.workhour')</h6>
                                    <p class="widget-content">@lang('home.everyday') <br> @lang('home.24h')</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="blog-post-card wow fadeInUp">
                                <a href="http://rimonnahid.storialtech.com" target="_blank" style="text-decoration: none;"><div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ asset('public/front/assets/images/for fb.jpg') }}" alt="blog" width="100%">
                                </div>
                                <p class="blog-post-date text-light pt-2 text-center">@lang('home.webdeveloper')</p>
                                <h5 class="blog-post-title text-center">@lang('home.smrimonnahid')</h5>

                                <span class="btn btn-block mb-2" style="background:#FB503C;">@lang('home.website')</span>
                            </a>
                                <a target="_blank" href="https://www.facebook.com/rimon.nahid.9/" class="btn btn-block" style="background:#4867AA;">@lang('home.facebook')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-text">
                    <p class="mb-md-0">©  2020</p>
                    <p class="mb-0">All right reserved.</p>
                </div>
            </div>
        </footer>
    
        <!-- Modals -->
        <!-- Off canvas social menu -->
        <nav id="offCanvasMenu" class="off-canvas-menu">
            <button type="button" class="close" aria-label="Close" data-dismiss="offCanvasMenu">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="oleez-social-menu">

                <li>
                    <a href="@if($setting) {{ $setting->fb_link }} @else # @endif" class="oleez-social-menu-link">@lang('home.facebook')</a>
                </li>
                <li>
                    <a href="@if($setting) {{ $setting->instagram_link }} @else # @endif" class="oleez-social-menu-link">@lang('home.instagram')</a>
                </li>
                <li>
                    <a href="@if($setting) {{ $setting->twitter_link }} @else # @endif" class="oleez-social-menu-link">@lang('home.twitter')</a>
                </li>
                <hr>
                @guest

                <li>
                    <a href="{{ route('login') }}" class="oleez-social-menu-link">@lang('home.login')</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="oleez-social-menu-link">@lang('home.register')</a>
                </li>

                @else
                @if(Auth::user()->is_admin == 1)
                <li>
                    <a href="{{ route('dashboard') }}" class="oleez-social-menu-link">@lang('home.dashboard')</a>
                </li>
                @endif
                <li>
                    <a class="oleez-social-menu-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">@lang('home.logout')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

                @endguest
            </ul>
        </nav>
        <!-- Full screen search box -->
        <div id="searchModal" class="search-modal">
            <button type="button" class="close" aria-label="Close" data-dismiss="searchModal">
                <span aria-hidden="true">&times;</span>
            </button>
            <form action="{{ route('search') }}" method="get" class="oleez-overlay-search-form">
                <label for="search" class="sr-only">Search</label>
                <input type="search" class="oleez-overlay-search-input" id="search" name="search" placeholder="Search here">
            </form>
        </div>
        <script src="{{ asset('public/front/assets/vendors/popper.js/popper.min.js') }}"></script>
        <script src="{{ asset('public/front/assets/vendors/wowjs/wow.min.js') }}"></script>
        <script src="{{ asset('public/front/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/front/assets/vendors/slick-carousel/slick.min.js') }}"></script>
        <script src="{{ asset('public/front/assets/js/main.js') }}"></script>
        <script src="{{ asset('public/front/assets/js/toastr.min.css') }}"></script>
        <script src="{{ asset('public/front/assets/js/sweetalert.min.js') }}"></script>
        <script>
            new WOW().init();
        </script>        
        <script src="{{ asset('public/front/assets/js/toastr.js')}}"></script>
        <script>
            
        //Toastr Notification
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                  toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
            }
        @endif
        </script>
    </body>

    </html>