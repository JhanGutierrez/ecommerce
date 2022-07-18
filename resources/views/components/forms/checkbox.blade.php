@props(['label' => 'Title', 'id' => '0', 'name' => ''])

<div class="checkbox mb-1">
    <input type="checkbox" id="{{ $id }}" name="{{ $name }}" class="absolute hidden">
    <label for="{{ $id }}"
        {{ $attributes->merge(['class' => 'relative cursor-pointer select-none']) }}>{{ $label }}</label>
</div>
