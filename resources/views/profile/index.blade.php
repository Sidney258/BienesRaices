<x-layout>
    <div class="flex flex-col md:flex-row gap-3">
        <div class="w-full p-10 shadow">
            <h1 class="text-center text-3xl font-bold">Meu Perfil</h1>
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
            <input class="w-full border px-2 py-2 outline-0 cursor-not-allowed mb-5" disabled type="text" label="Nome"
                name="name" id="name" value="{{ $user->name }}" />
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input class="w-full border px-2 py-2 outline-0 cursor-not-allowed mb-5" disabled type="email"
                label="email" name="email" id="email" value="{{ $user->email }}" disabled />
            <label for="data" class="block text-gray-700 text-sm font-bold mb-2">Data de registo</label>
            <input type="text" name="data" value="{{ $user->created_at }}"
                class="w-full border px-2 py-2 outline-0 cursor-not-allowed" disabled />
        </div>
        <div class="w-full p-10 mb-2 shadow">
            <h1 class="text-center text-3xl font-bold p-2 mb-2">Minhas Propriedades</h1>
            @forelse ($properties as $property)
                <div class="flex justify-between p-5 gap-2 border-b">
                    <h1 class="font-semibold">{{ $property->title }}</h1>
                    <div class="flex justify-between gap-2">
                        <a class="text-green-500 hover:underline"
                            href="{{ route('properties.edit', $property->id) }}">Editar</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                Remover
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center mt-5 text-gray-500">Ainda nao tem nenhuma propriedade registada<a
                        href="{{ route('create') }}" class="text-blue-200 underline"> registe uma aqui</a></p>
            @endforelse
        </div>
    </div>
</x-layout>
