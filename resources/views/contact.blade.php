@extends('layouts.app')

@section('content')
<section class="contact">
    <div class="contact-container">
        <h2>Get in Touch</h2>
        <p class="subtitle">We’d love to hear from you. Send us a message and we’ll respond as soon as possible.</p>

        <form class="contact-form">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" placeholder="John Doe">
            </div>

            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" placeholder="example@email.com">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" rows="5" placeholder="Type your message here..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Send Message</button>
        </form>
    </div>
</section>
@endsection
