<x-layout>
    <div class="max-w-4xl container mx-auto p-4">
        <div class="bg-white shadow rounded p-6">

            <a href="{{ route('properties.index') }}" class="text-black hover:underline">
                Voltar
            </a>
            <h1 class="text-2xl font-bold my-4">{{ $property->title }}</h1>

            <div class="mb-4">
                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}"
                    class="w-full h-auto rounded">
            </div>

            <div class="mb-4 bg-gray-100 p-4 rounded">
                <p><strong>Description:</strong> {{ $property->description }}</p>
                <p><strong>Price:</strong> {{ number_format($property->price, 2) }} MZN</p>
                <p> <strong>Status:</strong> {{ ucfirst($property->status) }}</p>
                <p><strong>Type:</strong> {{ ucfirst($property->type) }}</p>
                <div class="">
                    @if ($property->bedrooms)
                        <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                    @endif
                    @if ($property->bathrooms)
                        <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                    @endif
                    @if ($property->parking_spaces)
                        <p><strong>Parking Spaces:</strong> {{ $property->parking_spaces }}</p>
                    @endif
                </div>

                <div class="">
                    <p><strong>Address:</strong> {{ $property->address }}</p>
                    <p><strong>City:</strong> {{ $property->city }}</p>
                    <p><strong>State:</strong> {{ $property->state }}</p>
                    <p><strong>Country:</strong> {{ $property->country }}</p>
                </div>

                <div class="">
                    <p><strong>Contact:</strong> {{ $property->contact }}</p>
                </div>
            </div>
            <div class="flex justify-between items-center mt-6">
                @can('update', $property)
                    <!-- esquerda -->
                    <div class="flex gap-3">
                        <a href="{{ route('properties.edit', $property->id) }}"
                            class="bg-green-500 text-white px-6 py-2 rounded w-40 text-center hover:bg-green-600 transition">
                            Editar
                        </a>

                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white cursor-pointer px-6 py-2 rounded w-40 hover:bg-red-600 transition">
                                Remover
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</x-layout>
