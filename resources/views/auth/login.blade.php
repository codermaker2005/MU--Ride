@extends('layouts.app')

@section('content')
<div class="card" style="max-width:400px;margin:auto;">
    <h3>LOGIN</h3>

    @if($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="field">
            <label>Email</label>
            <input class="input" name="email" placeholder="yourname@mu.edu.lb">
        </div>

        <div class="field">
            <label>Password</label>
            <input type="password" class="input" name="password">
        </div>

        <button class="btn-primary">Login</button>
    </form>
</div>
@endsection
