<x-layout>
    <x-search />
    <div class="p-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse ($properties as $property)
            <x-property-card :property="$property" />
        @empty
            <p class="col-span-full text-center">Nenhuma propriedade registada.</p>
        @endforelse
    </div>

    {{ $properties->links() }}

</x-layout>
