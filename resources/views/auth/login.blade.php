@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <h2>Login</h2>

    @if ($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Submit</button>
    </form>
@endsection
