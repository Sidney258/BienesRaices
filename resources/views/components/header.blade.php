<header class="border">
    <div class="md:flex justify-between items-center p-7">
        <a href="{{ url('/') }}">
            <h1 class="text-4xl font-bold text-black text-center md:text-left">Bienes<strong>Raices</strong></h1>
        </a>

        <nav class="flex flex-col items-center gap-4 md:flex-row">
            <a class="text-black hover:underline" href="{{ route('properties.index') }}">propriedades</a>

            @guest
                <a class="text-white bg-black px-4 py-1.5 rounded" href="{{ route('login') }}">login</a>
                <a class="text-white bg-black px-4 py-1.5 rounded" href="{{ route('register') }}">registar</a>
            @endguest

            @auth
                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-black hover:underline">
                        logout
                    </button>
                </form>
                <a class="text-black hover:underline" href="{{ route('profile') }}">perfil</a>
            @endauth

            @auth
                <a class="px-10 py-3 bg-black text-white font-semibold rounded" href="{{ route('create') }}">
                    criar <i class="fa-solid fa-circle-plus ml-3"></i>
                </a>
            @endauth
        </nav>
    </div>
</header>
