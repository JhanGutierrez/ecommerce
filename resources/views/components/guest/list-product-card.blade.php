@props(['uri' => '', 'imgUrl' => '', 'productName' => '', 'productPrice' => ''])

<li
    {{ $attributes->merge(['class' => 'w-full grid md:grid-cols-[250px_1fr] md:items-center md:border-b border-gray-200 md:pb-4 last:pb-0 last:border-none']) }}>

    <div class="group overflow-hidden">
        <a href="{{ $uri }}" class="block h-full w-full md:mr-4">
            <img class="h-auto w-full scale-105 object-cover transition-all duration-300 group-hover:scale-100"
                src="{{ $imgUrl }}" alt="{{ $productName }}">
        </a>
    </div>

    <div class="w-full overflow-hidden py-4 text-center">
        <h3 class="truncate">
            <a href="{{ $uri }}" class="font-bold">
                {{ $productName }}
            </a>
        </h3>
        <p class="text-gray-400">${{ $productPrice }}</p>
    </div>
</li>
