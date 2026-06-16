<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrewAdmin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">

    <header class="bg-amber-800 text-white py-4 px-6">
<nav class="max-w-6xl mx-auto flex justify-between items-center">
    <a href="{{ route('products.index') }}" class="text-xl font-bold">☕ BrewAdmin</a>

    @auth
        <div class="flex gap-3">
            <a href="{{ route('products.create') }}" class="bg-white text-amber-800 px-4 py-2 rounded font-semibold hover:bg-amber-100">
                + Add Product
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-amber-900 text-white px-4 py-2 rounded font-semibold hover:bg-amber-950">
                    Logout
                </button>
            </form>
        </div>
    @endauth
</nav>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-8">

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6" role="alert">
            <span>✓</span> {{ session('success') }}
        </div>
        @endif

        @yield('content')

    </main>

    <footer class="text-center text-gray-500 text-sm py-6">
        BrewAdmin &copy; {{ date('Y') }}
    </footer>

</body>

</html>