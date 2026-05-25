<x-layout>
    <h2 class="text-4xl text-center font-bold mb-4">
        Crie a sua publicacao
    </h2>
    <div class="mx-auto p-8 shadow w-full md:max-w-2xl">
        <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
            @csrf

            <x-input id="title" name="title" label="Titulo" type="text" placeholder="Title" />

            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descricao</label>
            <textarea class="w-full border py-2 px-3 appearance-none outline-0 mb-2" placeholder="descricao" name="description"
                id="description" cols="5" rows="4"> {{ old('description') }}
            </textarea>

            <x-input id="price" name="price" label="Preco" type="number" placeholder="Price" />

            <x-select id="property_status" name="status" label="Estado" :options="['sale' => 'sale', 'rent' => 'rent', 'sold' => 'sold']" />

            <x-select id="property_type" name="type" label="Tipo" :options="['house' => 'house', 'apartment' => 'apartment', 'land' => 'land', 'room' => 'room']" />

            <x-input id="bedrooms" name="bedrooms" label="Quartos" type="number" placeholder="Quartos" />

            <x-input id="bathrooms" name="bathrooms" label="Banheiros" type="number" placeholder="Banheiros" />

            <x-input id="parking_spaces" name="parking_spaces" label="Estacionamentos" type="number"
                placeholder="Estacionamentos" />

            <x-input id="address" name="address" label="Endereco" type="text" placeholder="Endereco" />

            <x-input id="city" name="city" label="Cidade" type="text" placeholder="City" />

            <x-input id="state" name="state" label="Estado" type="text" placeholder="Estado" />

            <x-input id="contact" name="contact" label="Contacto" type="number" placeholder="Contacto" />

            <x-file id="image" name="image" label="Imagem" />

            <button type="submit"
                class="w-full bg-black text-white py-4 hover:cursor-pointer focus:outline-none rounded">
                Criar
            </button>
        </form>
    </div>
</x-layout>
