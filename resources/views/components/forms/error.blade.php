@props(['message' => ''])

<div {{ $attributes->merge(['class' => 'relative z-20 bg-red-500 text-xs font-medium text-white']) }}>
    <span>{{ $message }}</span>
    <span>x</span>
    {{-- <span class="block">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="44" height="44"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
    </span> --}}
</div>
