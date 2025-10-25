@extends('layouts.app')

@section('content')
<section class="auth-section">
  <div class="auth-container">
    <h1 class="page-title">Login</h1>

    <form action="#" method="post" class="auth-form">
      @csrf
      <div class="form-group">
        <label>Email</label>
        <input type="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" placeholder="Enter your password" required>
      </div>

      <button type="submit" class="btn-submit">Login</button>
      <p class="auth-note">Don’t have an account?
        <a href="{{ route('register') }}">Sign Up</a>
      </p>
    </form>
  </div>
</section>
@endsection
