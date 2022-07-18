<section class="mx-auto mb-12 mt-[70px] max-w-screen-xl px-4">

    @if (\Cart::getContent()->count() > 0)
        <div class="pt-14">

            <table class="w-full table-auto">
                <thead class="">
                    <tr>
                        <th class="border-b border-gray-200 pb-4"></th>
                        <th class="border-b border-gray-200 pb-4 font-bold">Cantidad</th>
                        <th class="border-b border-gray-200 pb-4 font-bold">Precio</th>
                        <th class="border-b border-gray-200 pb-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\Cart::getContent()->sortBy('id') as $item)
                        <tr class="border-b border-gray-200">
                            <td class="py-3">
                                <div class="flex items-center">
                                    <img src="{{ $item->attributes->img }}" alt="{{ $item->name }}"
                                        class="mr-2 h-auto w-28 object-cover">
                                    <div class="w-full overflow-hidden">
                                        <p class="truncate text-lg">{{ $item->name }}</p>

                                        @if ($item->attributes->size_id)
                                            <p class="mr-2 text-sm text-gray-400">Talla: <span
                                                    class="text-black">{{ App\Models\Size::where('id', $item->attributes->size_id)->first()->name }}</span>
                                            </p>
                                        @endif

                                        @if ($item->attributes->color_id)
                                            <p class="mr-2 text-sm text-gray-400">Color: <span
                                                    class="text-black">{{ App\Models\Color::where('id', $item->attributes->color_id)->first()->name }}</span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="py-3">
                                @livewire('guest.update-cart-item', ['itemId' => $item->id], key($item->name . '_' . $item->id))
                            </td>

                            <td class="py-3 text-center">
                                <p class="">COP {{ $item->price * $item->quantity }}</p>
                            </td>
                            <td class="py-3">
                                <button class="block cursor-pointer" wire:click="clearItem('{{ $item->id }}')"
                                    wire:loading.class='opacity-25' wire:target="clearItem('{{ $item->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-x transition-opacity duration-200 hover:opacity-50"
                                        width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <p class="mt-4 mb-4 text-gray-400">Subtotal: <span class="text-black">COP
                    {{ \Cart::getSubtotal() }}</span>
            </p>
            <div class="grid grid-cols-2">
                <div>
                    <a href="{{ route('order.generate') }}">
                        <x-button title="Continuar" class="w-full max-w-[280px]" />
                    </a>
                </div>

                <div class="flex w-full items-center justify-end">
                    <button
                        class="group flex w-fit cursor-pointer items-center transition-opacity duration-200 hover:opacity-50"
                        wire:click="clearCart">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-x transition-opacity duration-200 group-hover:opacity-50"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                        Limpiar carrito
                    </button>
                </div>
            </div>

        </div>
    @else
        <div class="pt-4 text-center">
            <h1 class="text-xl">Aún no has agregado nada 😕</h1>

            <a href="{{ route('home') }}"
                class="group mx-auto mt-4 flex w-fit items-center transition-opacity duration-200 hover:opacity-50">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-arrow-narrow-left transition-opacity duration-200 group-hover:opacity-50"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <line x1="5" y1="12" x2="9" y2="16" />
                    <line x1="5" y1="12" x2="9" y2="8" />
                </svg>
                Ir al inicio
            </a>

        </div>
    @endif
</section>
