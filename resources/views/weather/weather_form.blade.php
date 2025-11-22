@if(session('success'))
    <div class="mb-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded-lg text-sm">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-3 text-red-700 bg-red-100 border border-red-300 rounded-lg text-sm">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('get.weather') }}" method="GET" class="space-y-5">
    @csrf

    <div>
        <label for="city" class="block text-gray-700 font-medium mb-1">City:</label>
        <textarea name="city" id="city" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition p-2.5 resize-none"></textarea>
    </div>

    <button type="submit"
            class="w-full py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg shadow transition-transform transform hover:scale-[1.02] active:scale-95">
        ✉️ Get weather
    </button>
</form>