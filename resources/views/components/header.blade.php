<header class="">
    <div class="md:flex justify-between items-center p-7">
        <a href="{{ url('/') }}">
            <h1 class="text-4xl font-bold text-black text-center md:text-left">Bienes<strong>Raices</strong></h1>
        </a>

        <nav class="flex flex-col items-center gap-4 md:flex-row">
            <a class="text-black hover:underline" href="{{ route('properties.index') }}">propriedades</a>

            @guest
                <a class="text-black hover:underline" href="{{ route('login') }}">login</a>
                <a class="text-black border-2 px-4 py-2" href="{{ route('register') }}">registar</a>
            @endguest

            @auth
                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-black hover:underline cursor-pointer">
                        logout
                    </button>
                </form>
                <a class="text-black hover:underline" href="{{ route('favorites.index') }}">favoritos</a>
                <a class="text-black hover:underline" href="{{ route('profile') }}">perfil</a>
            @endauth

            @auth
                <a id="button" class="px-10 py-3 text-black hover:bg-black hover:text-white transition font-semibold"
                    href="{{ route('create') }}">
                    criar <i class="fa-solid fa-circle-plus ml-3"></i>
                </a>
            @endauth
        </nav>
    </div>
</header>
