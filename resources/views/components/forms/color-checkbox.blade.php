@props(['id' => '', 'name' => '', 'colorHex' => ''])

<div class="color-checkbox relative">
    <input type="checkbox" name="{{ $name }}" id="color-{{ $id }}" aria-checked="false"
        class="checked:bg-blue-500" value="{{ $id }}" hidden {{ $attributes->merge([]) }}>
    <label for="color-{{ $id }}"
        class="mr-2 block h-[18px] w-[18px] cursor-pointer rounded-full border border-gray-200"
        style="background-color:{{ $colorHex }}"></label>
</div>
