<header class="header px-20 border-b py-2">
    <div class="container container-header">
        <a href="{{ url('/') }}">
            <h1 class="text-4xl text-black md:text-center">Bienes<strong>Raices</strong></h1>
        </a>

        <nav class="main-nav">
            <a class="text-black hover:underline" href="{{ route('properties.index') }}">propriedades</a>

            @guest
                <a class="text-black hover:underline" href="{{ route('login') }}">login</a>
                <a class="text-black hover:underline" href="{{ route('register') }}">registar</a>
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
                <a class="px-10 py-3 bg-black text-white font-semibold" href="{{ route('create') }}">
                    criar <i class="fa-solid fa-circle-plus ml-3"></i>
                </a>
            @endauth
        </nav>
    </div>
</header>
