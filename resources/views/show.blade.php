@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">

    {{-- Back --}}
    <a href="{{ route('posts') }}" class="text-blue-600 mb-4 inline-block">
        ← Back to posts
    </a>

    {{-- POST HEADER --}}
    <div class="p-6 rounded shadow mb-8
        @if($post->color === 'green') bg-success bg-opacity-25
        @elseif($post->color === 'yellow') bg-warning bg-opacity-25
        @elseif($post->color === 'red') bg-danger bg-opacity-25
        @else bg-light
        @endif
    ">
        <h1 class="text-2xl font-bold mb-2">
            {{ $post->description }}
        </h1>

        <small class="text-gray-600">
            Created at {{ $post->created_at->format('d.m.Y H:i') }}
        </small>
    </div>

    {{-- COMMENTS --}}
    <h6 class="text-xl font-bold mb-4">
        Comments ({{ $post->comments->count() }})
    </h6>

    @forelse($post->comments as $comment)
        <div class="border rounded p-4 mb-3 bg-white shadow-sm">
            <div class="flex justify-between mb-1">
                <strong>
                    {{ $comment->users->first()->name ?? 'Guest' }}
                </strong>
                <small class="text-gray-500">
                    {{ $comment->created_at->format('d.m.Y H:i') }}
                </small>
            </div>

            <p>
                {{ $comment->description }}
            </p>
        </div>
    @empty
        <p class="text-muted mb-4">
            No comments yet.
        </p>
    @endforelse

    {{-- ADD COMMENT --}}
    <h3 class="text-lg font-bold mt-8 mb-3">
        Add comment
    </h3>

    <form method="POST" action="{{ route('comments.store', $post) }}">
        @csrf

        <div class="mb-3">
            <textarea
                name="description"
                class="form-control"
                rows="3"
                required
                placeholder="Write your comment..."
            ></textarea>
        </div>

        <button class="btn btn-success">
            Save comment
        </button>
    </form>

</div>
@endsection
