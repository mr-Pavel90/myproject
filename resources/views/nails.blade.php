@extends('layouts.app')

@section('title', 'All Nails')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 text-primary">💅 manicure appointments</h2>

    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body p-4">
            @if($nails->isEmpty())
                <div class="alert alert-info text-center">
                    No entries yet 💬
                </div>
            @else
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col"><Time></Time></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nails as $index => $nail)
                            <tr>
                                <td><strong>{{ $index + 1 }}</strong></td>
                                <td>{{ $nail->user->name }}</td>
                                <td>{{ $nail->user->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($nail->time)->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
