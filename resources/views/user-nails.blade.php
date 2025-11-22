@extends('layouts.app')

@section('title', 'Лидер по записям')

@section('content')
<div class="container mt-5">
    @if($topUserData)
        <div class="card shadow-lg rounded-4 border-0 text-center p-4 bg-light">
            <h3 class="text-success mb-3">🏆 Пользователь с наибольшим числом записей</h3>
            <p class="fs-5">
                <strong>Имя:</strong> {{ $topUserData->name }}<br>
                <strong>Телефон:</strong> {{ $topUserData->phone }}<br>
                <strong>Количество записей:</strong> {{ $topUser }}
            </p>
        </div>
    @else
        <div class="alert alert-info text-center">
            Пока нет пользователей или записей 💬
        </div>
    @endif
</div>
@endsection
