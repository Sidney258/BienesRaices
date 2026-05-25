<x-layout>
    <div class="m-auto max-w-2xl">
        <form action="{{ route('properties.search') }}" method="GET" class="flex justify-between gap-2">
            <input class="w-full bg-gray-300 outline-0 border-0 p-2" id="location" type="text" name="location"
                placeholder="Maputo...">
            <button class="bg-black text-white py-2 px-4 cursor-pointer" type="submit">procurar</button>
        </form>
    </div>
    <div class="p-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse ($properties as $property)
            <x-property-card :property="$property" />
        @empty
            <p class="col-span-full text-center">Nenhuma propriedade registada.</p>
        @endforelse
    </div>

    {{ $properties->links() }}

</x-layout>
