@props(['id', 'name', 'value' => null, 'label' => null, 'placeholder' => '', 'type' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
        class="appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error($name) border-red-500 @enderror"
        value="{{ old($name, $value) }}">
    @error($name)
        <p class="w-full bg-red-500 p-2 text-white text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
