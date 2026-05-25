<x-layout>
    <div class="mx-auto shadow p-8 w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">
            Editar Propriedade
        </h2>
        <form method="POST" action="{{ route('properties.update', $property->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-input id="title" name="title" label="Titulo" type="text" placeholder="Title" :value="old('title', $property->title)" />

            <textarea class="w-full border py-2 px-3 appearance-none outline-0 mb-2" placeholder="descricao" name="description"
                id="description" cols="5" rows="4"> {{ old('description', $property->description) }}
            </textarea>

            <x-input id="price" name="price" label="Preco" type="number" placeholder="Price"
                :value="old('price', $property->price)" />

            <x-select id="property_status" name="status" label="Estado" :options="['sale' => 'sale', 'rent' => 'rent', 'sold' => 'sold']" :value="old('status', $property->status)" />

            <x-select id="property_type" name="type" label="Tipo" :options="['house' => 'house', 'apartment' => 'apartment', 'land' => 'land', 'room' => 'room']" :value="old('type', $property->type)" />

            <x-input id="bedrooms" name="bedrooms" label="Quartos" type="number" placeholder="Quartos"
                :value="old('bedrooms', $property->bedrooms)" />

            <x-input id="bathrooms" name="bathrooms" label="Banheiros" type="number" placeholder="Banheiros"
                :value="old('bathroom', $property->bathrooms)" />

            <x-input id="parking_spaces" name="parking_spaces" label="Estacionamentos" type="number"
                placeholder="Estacionamentos" :value="old('parking_spaces', $property->parking_spaces)" />

            <x-input id="address" name="address" label="Endereco" type="text" placeholder="Endereco"
                :value="old('address', $property->address)" />

            <x-input id="city" name="city" label="Cidade" type="text" placeholder="City"
                :value="old('city', $property->city)" />

            <x-input id="state" name="state" label="Estado" type="text" placeholder="Estado"
                :value="old('state', $property->state)" />

            <x-input id="contact" name="contact" label="Contacto" type="text" placeholder="Contacto"
                :value="old('contact', $property->contact)" />

            <div class="p-1">
                <label class="block font-semibold" for="image">Imagem Actual</label>
                <img id="image" class="w-25 h-25" src="{{ asset('storage/' . $property->image) }}" alt="imagem">
            </div>
            <x-file id="image" name="image" label="Escolher nova Imagem" />

            <button type="submit"
                class="w-full bg-black text-white py-4 hover:cursor-pointer capitalize focus:outline-none">
                actualizar informacoes
            </button>
        </form>
    </div>
</x-layout>
