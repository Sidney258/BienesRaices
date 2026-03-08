@props(['property'])

<div class="bg-gray-100 border-gray-500 relative">
    <!-- Badge aluguel -->
    <span class="absolute top-3 right-3 bg-white text-black text-sm px-3 py-1 rounded-full">
        {{ $property->status }}
    </span>

    <img class="w-full" src="{{ asset('storage/' . $property->image) }}" alt="imagem-anuncio">

    <div class="p-5">
        <h1 class="text-3xl text-center font-semibold">{{ $property->title }}</h1>

        <p class="text-center p-5 rounded">
            {{ $property->description }}
        </p>

        <!-- Preço -->
        <p class="text-center font-bold p-2 mb-2">
            <span class="text-black">Preço:</span>
            {{ number_format($property->price, 2, ',', '.') }} MZN
        </p>

        <ul class="flex flex-col gap-4 items-center px-10 md:flex-row justify-between">
            @if ($property->bathrooms)
                <li class="flex justify-between items-center gap-2">
                    <img src="{{ asset('images/icono_wc.svg') }}" alt="">
                    <p class="text-black text-center">{{ $property->bathrooms }}</p>
                </li>
            @endif
            @if ($property->parking_spaces)
                <li class="flex justify-between items-center gap-2">
                    <img src="{{ asset('images/icono_estacionamiento.svg') }}" alt="">
                    <p class="text-black text-center">{{ $property->parking_spaces }}</p>
                </li>
            @endif
            @if ($property->bedrooms)
                <li class="flex justify-between items-center gap-2">
                    <img src="{{ asset('images/icono_dormitorio.svg') }}" alt="">
                    <p class="text-black text-center">{{ $property->bedrooms }}</p>
                </li>
            @endif
        </ul>

        <a href="{{ route('properties.show', $property->id) }}"
            class="block mt-10 px-10 py-5 bg-black text-white text-center">
            Ver detalhes
        </a>
    </div>
</div>
