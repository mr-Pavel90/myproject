@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white shadow-md rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-5 text-center">User Information</h2>

    <div class="space-y-3">
        <div>
            <span class="font-semibold text-gray-700">ID:</span>
            <span class="text-gray-900">{{ $user->id }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Name:</span>
            <span class="text-gray-900">{{ $user->name }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Email:</span>
            <span class="text-gray-900">{{ $user->email }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Phone:</span>
            <span class="text-gray-900">{{ $user->phone }}</span>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ url()->previous() }}"
            class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
            ⬅ Back
        </a>
    </div>

</div>
@endsection
