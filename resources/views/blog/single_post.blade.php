@extends('layouts.app')
@section('title','Home | '. $post->title )


@section('content')
    
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp">{{ $post->title }}</h1>
            <div class="row">
                <div class="col-md-9 blog-post-wrapper">
                    <div class="post-header wow fadeInUp">
                        <img src="{{ asset('storage/app/public/'.$post->image) }}" alt="blog post" class="post-featured-image">
                        <p class="post-date">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="post-content wow fadeInUp">
                        <span>{!! $post->body !!}</span>
                    </div>
                    <div class="post-tags wow fadeInUp">
                        @foreach($postcategories as $post)
                        <a href="#!" class="post-tag">{{ $post->title }}</a>
                        @endforeach
                    </div>
                    <div class="post-navigation wow fadeInUp">
                      {{--   <button class="btn prev-post"> Prev Post</button>
                        <button class="btn next-post"> Next Post</button> --}}
                    </div>
{{--                     <div class="comment-section wow fadeInUp">
                        <h5 class="section-title">Leave a Reply</h5>
                        <form action="POST" class="oleez-comment-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="oleez-input" id="fullName" name="fullName" required>
                                    <label for="fullName">*Full name</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="oleez-input" id="fullName" name="email" required>
                                    <label for="email">*Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="message">*Message</label>
                                    <textarea name="message" id="message" rows="10" class="oleez-textarea" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    
                    <div class="fb-comments" data-href="{{ URL::current() }}" data-width="820" data-numposts="5"></div>
                </div>
                <div class="col-md-3">
                @include('layouts.sidebar')
                    
                </div>
            </div>
        </div>
        <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="3EJzgC2q"></script>
    </main>
@endsection
