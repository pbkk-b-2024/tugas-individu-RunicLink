<header class="bg-dark text-white p-3 custom-header">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h4 mb-0">Rune Hotel</h1>

        <!-- User Info and Logout Button -->
        <div class="ml-auto d-flex align-items-center">
            <!-- User Name -->
            <a href="/profile" class="ml-2 text-white">{{ auth()->user()->name }}</a>
            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="ml-3">
                @csrf
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </div>
</header>
