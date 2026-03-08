<div class="p-4">
    <form action="{{ route('properties.search') }}" method="GET" class="w-full grid grid-cols-1 md:grid-cols-4 gap-4">

        <div>
            <input type="text" name="keywords" placeholder="Procurar"
                class="w-full border rounded px-4 py-2 focus:outline-none">
        </div>

        <div>
            <input type="text" name="location" placeholder="Localização"
                class="w-full border rounded px-4 py-2 focus:outline-none">
        </div>

        <div>
            <select name="type" class="w-full border rounded px-4 py-2 focus:outline-none">
                <option value="">Tipo</option>
                <option value="house">House</option>
                <option value="apartment">Apartment</option>
                <option value="land">Land</option>
                <option value="room">Room</option>
            </select>
        </div>

        <div>
            <button type="submit" class="w-full bg-black text-white rounded px-4 py-2 hover:bg-gray-800">
                Pesquisar
            </button>
        </div>

    </form>
</div>
