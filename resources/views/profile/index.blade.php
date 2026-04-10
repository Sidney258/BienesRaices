<x-layout>
    <div class="flex flex-col md:flex-row gap-3">
        <div class="w-full p-10">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                <h1 class="text-center text-3xl font-bold">Meu Perfil</h1>
                <x-input name='name' type='text' label='Name' id="email" :value='$user->name' />
                <x-input name='email' type='email' label='Email' id="email" :value='$user->email' />
                <input class="bg-green-500 py-2 w-full cursor-pointer text-white mt-2" type="submit"
                    value="Actualizar">
            </form>
        </div>
        <div class="w-full p-10 mb-2">
            <h1 class="text-center text-3xl font-bold p-2 mb-2">Minhas Propriedades</h1>
            @forelse ($properties as $property)
                <div class="p-2">
                    <img class="w-full h-40" src="{{ asset('storage/' . $property->image) }}"
                        alt="{{ $property->title }}">
                    <h1 class="font-bold">{{ $property->title }}</h1>
                    <div class="flex gap-2 mt-2">
                        <a class="text-white bg-green-500 p-2 cursor-pointer rounded"
                            href="{{ route('properties.edit', $property->id) }}">Editar</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-500 p-2 cursor-pointer rounded">
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
