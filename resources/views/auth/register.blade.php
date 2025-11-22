@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <h2>Register</h2>

    @if ($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Name:</label><br>
        <input name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Phone:</label><br>
        <input type="phone" name="phone" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label for="password_confirmation">Confirm Password:</label><br>
        <input name="password_confirmation" type="password" required><br><br>

        <button type="submit">Submit</button>
    </form>
@endsection
