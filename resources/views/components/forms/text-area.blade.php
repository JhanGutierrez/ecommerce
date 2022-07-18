@props(['id' => '', 'title' => '', 'name' => '', 'placeholder' => '', 'containerClass' => ''])

<div class="{{ $containerClass }}">
    @if ($title)
        <label for="{{ $id }}" class="mb-1 block">{{ $title }}</label>
    @endif

    <textarea name="{{ $name }}" id="{{ $id }}" cols="30" rows="4"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'border border-gray-300 py-3 px-3 transition-all duraiton-200 focus:outline-0 focus:border-black hover:border-black', 'type' => 'text']) }}>{{ $value }}</textarea>
</div>
