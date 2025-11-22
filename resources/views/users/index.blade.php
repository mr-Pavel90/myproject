@extends('layouts.app')

@section('title', 'All Users')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 text-danger">👥 Все пользователи</h2>

    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body p-4">
            @if($users->isEmpty())
                <div class="alert alert-warning text-center">
                    Пользователей пока нет ⚠️
                </div>
            @else
                <table class="table table-hover align-middle text-center">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td><strong>{{ $index + 1 }}</strong></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
