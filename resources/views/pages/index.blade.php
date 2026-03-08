<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($properties as $property)
            <x-property-card :property="$property" />
        @empty
            <p class="col-span-full text-center">Nenhuma propriedade registada.</p>
        @endforelse
    </div>
    <div class="mt-10 w-full flex justify-center">
        @if (count($properties) > 0)
            <a class="px-6 py-3 text-black hover:underline" href="{{ route('properties.index') }}">Ver mais</a>
        @endif
    </div>
</x-layout>
