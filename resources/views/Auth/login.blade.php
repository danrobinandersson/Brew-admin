@extends('layouts.app')

@section('content')
<main>
    <h1 class="text-2xl font-bold mb-6">Login</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-4" role="alert">
            <strong>Error:</strong> {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" class="space-y-4 max-w-sm">
        @csrf

        <div>
            <label for="email" class="block font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="password" class="block font-medium mb-1">Password</label>
            <input type="password" name="password" id="password"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-amber-800 text-white px-4 py-2 rounded hover:bg-amber-900">
            Log in
        </button>
    </form>
</main>
@endsection