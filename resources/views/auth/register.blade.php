<x-layout>
    {{-- This is the login view --}}
    <div class="w-full shadow max-w-md mx-auto mt-10">
        <h2 class="text-4xl font-bold my-6 text-center">Registo</h2>
        <form action="{{ route('register.store') }}" method="POST" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <x-input label="Name" type="text" id="name" name="name" placeholder="Nome" />

            <x-input label="Email" type="email" id="email" name="email" placeholder="Email" />

            <x-input label="Password" type="password" id="password" name="password" placeholder="Password" />

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-black text-white w-full py-2 px-4 hover:cursor-pointer focus:outline-none">
                    Criar conta
                </button>
            </div>
            <div>
                <p class="text-black text-sm mt-5">Tem uma conta?<a class="text-blue-400 underline"
                        href="{{ route('login') }}">Inicia Sessao
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-layout>
