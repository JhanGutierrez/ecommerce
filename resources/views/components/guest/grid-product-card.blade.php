@props(['uri' => '', 'img1' => '', 'img2' => '', 'productName' => '', 'productPrice' => ''])

<li {{ $attributes->merge(['class' => 'w-full']) }}>

    <div class="overflow-hidden">
        <span class="text-primary absolute z-10 bg-black py-2 px-6">-10%</span>

        <a href="{{ $uri }}" class="group relative block h-full w-full">
            <img class="h-auto w-full object-cover opacity-0 transition-opacity duration-100 group-hover:opacity-100"
                src="{{ $img1 }}" alt="{{ $productName }}">
            <img class="absolute top-0 left-0 -z-10 h-auto w-full object-cover opacity-100" src="{{ $img2 }}"
                alt="{{ $productName }}">
        </a>
    </div>

    <div class="overflow-hidden py-4">
        <h3 class="truncate">
            <a href="{{ $uri }}" class="hover:scale-105">
                {{ $productName }}
            </a>
        </h3>
        <div class="flex">
            <p class="truncate text-gray-400 line-through">${{ $productPrice }}</p>
            <p class="ml-4 truncate">${{ $productPrice }}</p>
        </div>
    </div>
</li>
