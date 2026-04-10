<x-layout>
    <h2 class="text-4xl font-bold text-center">Login</h2>
    <div class="w-full shadow max-w-md mx-auto mt-10">
        <form action="{{ route('login.authenticate') }}" method="POST" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <x-input label="Email" type="email" id="email" name="email" placeholder="Email" />

            <x-input label="Password" type="password" id="password" name="password" placeholder="Password" />

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-black text-white w-full cursor-pointer py-2 px-4 focus:outline-none">
                    Login
                </button>
            </div>
            <div>
                <p class="text-black text-sm mt-5">Nao tem uma conta <a class="text-blue-300"
                        href="{{ route('register') }}">registe-se aqui</a></p>
            </div>
        </form>
    </div>
</x-layout>
