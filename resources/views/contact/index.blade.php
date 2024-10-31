<x-layouts.app>
    <div style="padding: 20px; max-width: 600px; margin: auto;">
        <h1>Contacteer Ons</h1>

        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <label for="name">Naam:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')<div style="color: red;">{{ $message }}</div>@enderror

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email')<div style="color: red;">{{ $message }}</div>@enderror

            <label for="message">Bericht:</label>
            <textarea name="message" rows="4" required>{{ old('message') }}</textarea>
            @error('message')<div style="color: red;">{{ $message }}</div>@enderror

            <input type="submit" value="Versturen">
        </form>
    </div>
</x-layouts.app>
