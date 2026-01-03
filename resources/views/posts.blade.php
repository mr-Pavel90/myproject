@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">

    <h1 class="text-3xl font-bold mb-6">Posts</h1>

    {{-- Если постов нет --}}
    @if($posts->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-6">
            There are no posts yet!
        </div>
    @else
        <div class="space-y-4 mb-6">
            @foreach($posts as $post)
                <div class="p-4 rounded shadow
                    @if($post->color === 'green') bg-success bg-opacity-25
                    @elseif($post->color === 'yellow') bg-warning bg-opacity-25
                    @elseif($post->color === 'red') bg-danger bg-opacity-25
                    @else bg-light
                    @endif
                ">
                    <p style="font-weight: bold;">{{ $post->description }}</p>
                    <small class="text-gray-600">
                        {{ $post->created_at->format('d.m.Y H:i') }}
                    </small>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Кнопка показать форму --}}
    <button onclick="toggleForm()" class="btn btn-primary" style="margin-top: 15px;">
        Add new Post
    </button>

    {{-- Форма (скрыта по умолчанию) --}}
    <div id="createPostForm" class="d-none mt-4">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Description</label>
                <textarea name="description" required
                          class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Color</label>
                <select name="color" required class="w-full border rounded p-2">
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                    <option value="red">Red</option>
                </select>
            </div>

            <button style="background-color: yellow !important; color: black !important;">
                Submit
            </button>
        </form>
    </div>

</div>

<script>
    function toggleForm() {
        document
            .getElementById('createPostForm')
            .classList.toggle('d-none');
    }
</script>
@endsection
