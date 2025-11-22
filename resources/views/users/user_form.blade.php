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

<form action="{{ route('store.user') }}" method="POST" class="space-y-5">
    @csrf

    <div>
        <label for="name" class="block text-gray-700 font-medium mb-1">Имя:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition p-2.5">
        @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition p-2.5">
        @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="phone" class="block text-gray-700 font-medium mb-1">Телефон:</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition p-2.5">
        @error('phone')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-gray-700 font-medium mb-1">Пароль:</label>
        <input type="password" name="password" id="password" required
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition p-2.5">
        @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Подтверждение пароля:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition p-2.5">
    </div>

    <button type="submit"
            class="w-full py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg shadow transition-transform transform hover:scale-[1.02] active:scale-95">
        👤 Создать пользователя
    </button>
</form>
