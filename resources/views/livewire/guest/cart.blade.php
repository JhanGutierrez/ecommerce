<div class="fixed z-50 h-screen w-full transition-all duration-200"
    :class="!showCart ? 'invisible opacity-0 active-cart' : ''" x-cloak>

    <div class="z-40 h-screen w-full bg-black opacity-50" @click="showCart = false"></div>

    <div class="absolute top-0 right-0 z-50 h-full w-full max-w-[400px] translate-x-0 overflow-auto bg-white pt-14 pb-4 transition-all duration-300"
        :class="!showCart ? 'invisible opacity-0 translate-x-[400px]' : ''">

        <div class="group absolute top-5 left-4 z-50 cursor-pointer" @click="showCart = false" id="close-cart">
            <div class="relative h-[18px] w-[18px] rotate-45">
                <span
                    class="absolute top-[50%] left-[50%] block h-[2px] w-[18px] translate-x-[-50%] translate-y-[-50%] bg-black transition-all duration-200 group-hover:-rotate-[45deg]"></span>
                <span
                    class="absolute top-[50%] left-[50%] block h-[2px] w-[18px] translate-x-[-50%] translate-y-[-50%] -rotate-90 bg-black transition-all duration-200 group-hover:-rotate-[45deg]"></span>
            </div>
        </div>

        @if (\Cart::getContent()->count() > 0)
            <div class="max-h-[calc(100vh-196px)] overflow-y-auto overflow-x-hidden px-4">
                <table class="w-full">

                    @foreach (\Cart::getContent()->sortBy('id') as $item)
                        <tr class="group border-b border-gray-200 first:pt-0 last:border-b-0">
                            <th class="pt-3 pb-3 text-left font-normal text-gray-400 group-first:pt-0 group-last:pb-0">
                                <img src="{{ $item->attributes->img }}" alt="{{ $item->name }}"
                                    class="h-auto w-20 object-cover">
                            </th>
                            <td class="pt-3 pb-3 pl-2 text-left group-first:pt-0 group-last:pb-0">
                                <h3>{{ $item->name }}</h3>
                                <p class="text-sm text-gray-400">
                                    <span>
                                        {{ $item->attributes->color_id != null ? App\Models\Color::where('id', $item->attributes->color_id)->first()->name : '' }}
                                    </span>
                                    <span>
                                        {{ $item->attributes->size_id != null ? App\Models\Size::where('id', $item->attributes->size_id)->first()->name : '' }}
                                    </span>
                                </p>
                            </td>
                            <td class="pt-3 pb-3 pl-2 text-right group-first:pt-0 group-last:pb-0">
                                <p>
                                    <span>{{ $item->price }}</span>
                                    <span class="block text-sm text-gray-400">{{ 'x ' . $item->quantity }}</span>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="mt-6 px-4">
                <p class="mb-6 text-black">
                    <span class="text-gray-400">Total:</span> COP
                    {{ \Cart::getSubTotal() }}
                </p>
                <a href="{{ route('shopping-cart') }}">
                    <x-button title="Comprar" class="w-full" />
                </a>
            </div>
        @else
            <div class="py-6 px-4 text-center text-gray-400">
                <p>Aún no has agregado nada al carrito</p>
            </div>
        @endif

    </div>
</div>
