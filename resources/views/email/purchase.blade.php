<div style="font-family: Arial">
    <h2 style="color:#16a34a;">Thank you for your purchase!</h2>

    <div style="border:1px solid #e5e7eb; padding:16px; border-radius:10px; max-width:400px">
        <h3>{{ $item->name }}</h3>

        @if($item->image)
            <img src="{{ asset('images/items/'.$item->image) }}"
                 style="width:100%; border-radius:8px;">
        @endif

        <p>{{ $item->description }}</p>

        <strong style="color:#16a34a;">
            ${{ number_format($item->price, 2) }}
        </strong>
    </div>
</div>
