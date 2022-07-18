@props(['id' => '', 'title' => '', 'value' => '', 'name' => '', 'placeholder' => '', 'containerClass' => '', 'labelClass' => ''])

<div class="{{ $containerClass }}">
    @if ($title)
        <label for="{{ $id }}" class="{{ $labelClass }} mb-1 block">{{ $title }}</label>
    @endif
    <input id="{{ $id }}" value="{{ $value }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'border border-gray-300 py-3 px-3 transition-all duraiton-200 focus:outline-0 focus:border-black hover:border-black', 'type' => 'text']) }}>
</div>
