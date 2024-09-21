<header class="bg-dark text-white p-3 custom-header">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h4 mb-0">Rune Hotel</h1>

        <!-- Logout Button -->
        <div class="ml-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </div>
</header>
