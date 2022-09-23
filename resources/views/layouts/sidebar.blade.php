@php 
    $postcategories = App\Models\Postcategory::where('status',1)->get();
    $galaries = App\Models\Galary::all();
    $setting = App\Models\Setting::first();
@endphp
    <div class="sidebar-widget wow fadeInUp">
        <h3 class="widget-title">@if($setting){{ $setting->header_title }} @endif</h3>
        <img src="@if($setting) {{ asset('storage/app/public/'.$setting->header_logo) }} @endif" width="100%" alt="">
    </div>
    <div class="sidebar-widget wow fadeInUp">
        <h5 class="widget-title" >@lang('home.category')</h5>
        <div class="widget-content">
            <ul class="category-list">
                @foreach($postcategories as $postcategory)
                <li style="border:1px solid gray ;" class="mb-1"><a href="{{ route('category.post',$postcategory->slug) }}" class="pl-3">{{ $postcategory->name }} <span style="float:right" class="pr-2">{{ count($postcategory->post) }}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-widget wow fadeInUp">
        <h5 class="widget-title">@lang('home.share')</h5>
        <div class="widget-content">
            <nav class="social-links">
                {{-- Facebook share button --}}
                <div class="fb-share-button" data-href="{{ URL::current() }}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
            </nav>
        </div>
    </div>
    <div class="sidebar-widget wow fadeInUp">
        <h5 class="widget-title">@lang('home.galary')</h5>
        <div class="widget-content">
            <div class="gallery">
                @foreach($galaries as $galary)
                <a href="{{ asset('storage/app/public/'.$galary->image) }}" class="gallery-grid-item" data-fancybox="widget-gallery">
                    <img src="{{ asset('storage/app/public/'.$galary->image) }}" alt="{{ $galary->title }}">
                </a>
                @endforeach
            </div>

        </div>
    </div>
    {{-- Facebook share script --}}
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="W3pp54tX"></script>