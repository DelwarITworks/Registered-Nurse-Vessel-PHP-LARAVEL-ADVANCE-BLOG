@extends('layouts.app')

@section('title','Contact')

@section('content')
<main class="contact-page">
    <div class="container">
        <h1 class="oleez-page-title wow fadeInUp">Contact Us</h1>
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0 pr-lg-5 wow fadeInLeft">
                <div class="embed-responsive embed-responsive-1by1">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d569.8721589804627!2d91.85758765414751!3d24.866301217696684!2m3!1f209.5168374816987!2f25.68510599724989!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x0%3A0x4b3326efe452da49!2sNorth%20East%20Nursing%20College!5e1!3m2!1sen!2sbd!4v1608978683964!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="col-md-6 pl-lg-5 wow fadeInRight">
                <form action="{{ route('store.contact') }}" class="oleez-contact-form">
                	@csrf
                    <div class="form-group">
                        <input type="text" class="oleez-input" id="fullName" name="name" required>
                        <label for="fullName">*Full name</label>
                    </div>
                    <div class="form-group">
                        <input type="email" class="oleez-input" id="fullName" name="email" required>
                        <label for="email">*Email</label>
                    </div>
                    <div class="form-group">
                        <label for="message">*Message</label>
                        <textarea name="message" id="message" rows="10" class="oleez-textarea" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection