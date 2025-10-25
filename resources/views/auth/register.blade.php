@extends('layouts.app')

@section('content')
<section class="auth-section">
  <div class="auth-container">
    <h1 class="page-title">Sign Up</h1>

    <form action="#" method="post" class="auth-form">
      @csrf
      <div class="form-group">
        <label>Full Name</label>
        <input type="text" placeholder="Your name" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" placeholder="Create a password" required>
      </div>

      <button type="submit" class="btn-submit">Create Account</button>
      <p class="auth-note">Already have an account?
        <a href="{{ route('login') }}">Login</a>
      </p>
    </form>
  </div>
</section>
@endsection
