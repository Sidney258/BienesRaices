<section class="hero flex items-center justify-center flex-col gap-5">
    <h1 class="text-5xl font-bold text-white text-center">Encontre a sua casa dos sonhos</h1>
    <form action="{{ route('properties.search') }}" method="GET" class="flex justify-between gap-2">
        <input class="w-full bg-gray-50 outline-0 border-0 p-2" id="location" type="text" name="location"
            placeholder="Maputo...">
        <button class="bg-black text-white py-2 px-4 cursor-pointer" type="submit">procurar</button>
    </form>
</section>
