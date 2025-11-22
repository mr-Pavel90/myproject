@extends('layouts.app')

@section('title', 'weather в ' . $city)

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">weather in city {{ $city }}</h4>
        </div>
        <div class="card-body">
            @if($records->isEmpty())
                <p class="text-muted">no data for the city {{ $city }}.</p>
            @else
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">date</th>
                            <th scope="col">temperature (°C)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($record->date)->format('d.m.Y') }}</td>
                                <td>{{ $record->temperature }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <a href="{{ url('/weather') }}" class="btn btn-secondary mt-3">back</a>
        </div>
    </div>
@endsection
