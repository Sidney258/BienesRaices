<x-layout>
    <h1 class="text-center text-4xl font-bold w-full border mb-5 p-2">Meus Favoritos</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($favorites as $favorite)
            <x-property-card :property="$favorite" />
        @empty
            <p class="text-gray-500">Ainda nao tens propriedades favoritas</p>
        @endforelse
        <div class="mt-6">{{ $favorites->links() }}</div>
    </div>
</x-layout>
