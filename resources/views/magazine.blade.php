@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h1 class="text-4xl font-bold mb-8 text-green-700 text-center">
        Healthy Nutrition Magazine
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($items as $item)
            <div class="bg-white border rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 flex flex-col">
                
                @if(!empty($item->image))
                    <img src="{{ asset('/images/items/'.$item->image) }}"
                         class="h-48 w-full object-cover" style=' padding: 10px;'>
                @endif

                <div class="p-5 flex flex-col flex-1">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $item->name ?? 'Название отсутствует' }}</h2>

                    <p class="text-gray-600 mb-4 flex-1">{{ $item->description ?? 'Описание отсутствует' }}</p>

                    <div class="flex items-center space-x-4 mt-3">

                    <span class="text-2xl font-extrabold px-4 py-2 rounded-lg shadow text-white"
                        style="background-color: #16a34a !important;">
                        ${{ number_format($item->price, 2) }}
                    </span>

                    <a href="#"
                    class="inline-block font-semibold px-5 py-2 rounded-lg shadow text-white no-underline"
                    style="background-color: #22c55e !important; text-decoration: none !important; margin-left: 5px;">
                        Buy
                    </a>
                </div>

                    <p class="text-sm text-gray-500 mb-2" style='margin-top: 15px;'>
                        Category: <span class="font-medium">{{ $item->category->name ?? 'Не указано' }}</span>
                    </p>

                    <div class="text-sm text-gray-500">
                        Tegs:
                        @if(!empty($item->tags))
                            @foreach($item->tags as $tag)
                                <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full mr-1 mt-1">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        @else
                            Нет тегов
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
