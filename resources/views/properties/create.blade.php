<x-layout>
    <div class="mx-auto p-8 shadow w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">
            Crie a sua publicacao
        </h2>
        <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
            @csrf

            <x-input id="title" name="title" label="Title" type="text" placeholder="Title" />

            <textarea class="w-full border py-2 px-3 appearance-none outline-0 mb-2" placeholder="descricao" name="description"
                id="description" cols="5" rows="4"> {{ old('description') }}
            </textarea>

            <x-input id="price" name="price" label="Price" type="number" placeholder="Price" />

            <x-select id="property_status" name="status" label="Status" :options="['sale' => 'sale', 'rent' => 'rent', 'sold' => 'sold']" />

            <x-select id="property_type" name="type" label="Type" :options="['house' => 'house', 'apartment' => 'apartment', 'land' => 'land', 'room' => 'room']" />

            <x-input id="bedrooms" name="bedrooms" label="Quartos" type="number" placeholder="Quartos" />

            <x-input id="bathrooms" name="bathrooms" label="Banheiros" type="number" placeholder="Banheiros" />

            <x-input id="parking_spaces" name="parking_spaces" label="Estacionamentos" type="number"
                placeholder="Estacionamentos" />

            <x-input id="address" name="address" label="Endereco" type="text" placeholder="Endereco" />

            <x-input id="city" name="city" label="City" type="text" placeholder="City" />

            <x-input id="state" name="state" label="Estado" type="text" placeholder="Estado" />

            <x-input id="contact" name="contact" label="Contacto" type="number" placeholder="Contacto" />

            <x-file id="image" name="image" label="Imagem" />

            <button type="submit" class="w-full bg-black text-white py-4 hover:cursor-pointer focus:outline-none">
                Criar
            </button>
        </form>
    </div>
</x-layout>
