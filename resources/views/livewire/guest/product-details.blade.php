<div class="mx-auto mt-[70px] max-w-screen-xl px-4">

    <div class="py-10">
        <p class="text-sm"><a class="font-bold" href="{{ route('home') }}">Inicio</a> / <a class="font-bold"
                href="{{ route('products.category', $product->subcategory->category) }}">{{ $product->subcategory->category->name }}</a>
            /
            <span class="text-gray-400">{{ $product->name }}</span>
        </p>
    </div>

    <section class="grid grid-cols-2 gap-4 pb-10">

        <div>
            <img src="{{ Storage::url($product->img_1) }}" class="m-auto" alt="{{ $product->name }}" width="600"
                id="product-details">

            <div class="m-auto mt-2 flex max-w-[600px] justify-between" id="sm-images">

                <div class="mr-2 cursor-pointer last:mr-0">
                    <img src="{{ Storage::url($product->img_1) }}" class="h-auto w-full" alt="{{ $product->name }}">
                </div>
                <div class="mr-2 cursor-pointer last:mr-0">
                    <img src="{{ Storage::url($product->img_2) }}" class="h-auto w-full" alt="{{ $product->name }}">
                </div>
                <div class="mr-2 cursor-pointer last:mr-0">
                    <img src="{{ Storage::url($product->img_3) }}" class="h-auto w-full"
                        alt="{{ $product->name }}">
                </div>
                <div class="mr-2 cursor-pointer last:mr-0">
                    <img src="{{ Storage::url($product->img_4) }}" class="h-auto w-full"
                        alt="{{ $product->name }}">
                </div>

            </div>
        </div>

        <div>
            <h1 class="mb-4 text-2xl font-bold">{{ $product->name }}</h1>
            <p class="mb-12 text-sm">{{ $product->description }}</p>
            <h3 class="mt-2 text-xl font-bold">COP {{ $product->price }}</h3>

            <div class="mt-6">
                <form wire:submit.prevent="addToCart">

                    @if (count($sizeList) > 0)
                        <div class="mb-4">
                            <div wire:loading.class='opacity-50 pointer-events-none' wire:target="selectedSize"
                                class="transition-all duration-200">
                                <x-forms.select title="Talla" name="selectedSize" id="selectedSize"
                                    wire:model='selectedSize'>
                                    <x-slot name="options">
                                        <option value="" selected disabled>Seleccionar</option>
                                        @foreach ($sizeList as $size)
                                            <option value="{{ $size['id'] }}">{{ $size['name'] }}</option>
                                        @endforeach
                                    </x-slot>
                                </x-forms.select>
                            </div>
                        </div>

                        <div>
                            <div wire:loading.class='opacity-50 pointer-events-none'
                                wire:target="selectedColor, selectedSize" class="transition-all duration-200">

                                <x-forms.select title="Color" name="selectedColor" id="selectedColor"
                                    wire:model='selectedColor'>
                                    <x-slot name="options">
                                        <option value="" selected disabled>Seleccionar</option>
                                        @foreach ($colorList as $color)
                                            <option value="{{ $color['id'] }}">{{ $color['name'] }}</option>
                                        @endforeach
                                    </x-slot>
                                </x-forms.select>
                            </div>
                        </div>
                    @elseif(count($colorList) > 0)
                        <div>
                            <div wire:loading.class='opacity-50 pointer-events-none' wire:target="selectedColor"
                                class="transition-all duration-200">
                                <x-forms.select title="Color" name="selectedColor" id="selectedColor"
                                    wire:model='selectedColor'>
                                    <x-slot name="options">
                                        <option value="" selected disabled>Seleccionar</option>
                                        @foreach ($colorList as $color)
                                            <option value="{{ $color['id'] }}">{{ $color['name'] }}</option>
                                        @endforeach
                                    </x-slot>
                                </x-forms.select>
                            </div>
                        </div>
                    @endif

                    <div>

                        <span
                            class="{{ $selectedColor != '' || count($sizeList) == 0 ? 'h-[20px]' : 'h-0' }} my-2 block overflow-hidden text-sm font-bold text-black transition-all duration-200">{{ $maxQuantity }}
                            disponible
                        </span>

                        <div class="flex">

                            <div class="relative mr-4 w-fit transition-all duration-200"
                                wire:loading.class="opacity-25 pointer-events-none"
                                wire:target="addQty, removeQty, qty">
                                <span
                                    class="decrement absolute top-0 left-0 flex h-full w-[40px] cursor-pointer select-none items-center justify-center"
                                    wire:click="removeQty">&#8722
                                </span>
                                <input type="number"
                                    class="block h-[49px] w-[120px] appearance-none border border-black bg-transparent px-11 text-center focus:outline-0"
                                    value="{{ $qty }}" wire:model.lazy='qty'>
                                <span
                                    class="increment absolute right-0 top-0 flex h-full w-[40px] cursor-pointer select-none items-center justify-center"
                                    wire:click="addQty">&#43
                                </span>
                            </div>

                            <button
                                class='hover:text-primary {{ $selectedSize == '' || $selectedColor == '' ? '' : '' }} flex h-[50px] w-full transform select-none items-center justify-center bg-black px-3 text-white transition-all duration-300'
                                wire:loading.class="pointer-events-none" wire:target='addToCart' type="submit">

                                <span>
                                    <svg width="122" height="122" viewBox="0 0 122 122" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6 animate-spin"
                                        wire:loading wire:target='addToCart'>
                                        <circle cx="61" cy="61" r="50" stroke="#e5e7eb"
                                            stroke-width="22" stroke-opacity="0.5" />
                                        <path
                                            d="M111 61C111 71.0229 107.988 80.8144 102.354 89.1042C96.7203 97.3939 88.7253 103.799 79.4062 107.489C70.0872 111.178 59.8743 111.982 50.0928 109.796C40.3113 107.609 31.4127 102.534 24.5516 95.2274"
                                            stroke="#d8fc3c" stroke-width="22" />
                                    </svg>
                                </span>

                                <span wire:loading.remove wire:target='addToCart' class="">Añadir al
                                    carrito</span>
                            </button>
                        </div>
                    </div>

                    <!--TODO: FADE IN AND OUT -->
                    @if ($errorMessage != '')
                        <div>
                            <x-forms.error class="mt-4 w-full p-3" message="{{ $errorMessage }}" />
                        </div>
                    @endif

                </form>
            </div>

            <div>
                <h3 class="mb-2 mt-12 text-xl font-bold">Especificaciones</h3>
                <p class="text-sm text-gray-400">Marca:
                    <span class="text-black">
                        {{ $product->brand->name }}
                    </span>
                </p>

                <!-- TODO: Fix this-->
                <p class="text-sm text-gray-400">Entrega:
                    <span class="text-black">Recíbelo el</span>
                    <span class="text-black">
                        {{ now()->addDay(7)->formatLocalized('%A %d %B %Y') }}
                    </span>
                </p>
            </div>
        </div>

    </section>

</div>


@push('scripts')
    <script>
        const productDetails = document.getElementById('product-details');
        const smallImages = document.getElementById('sm-images');

        Array.from(smallImages.children).forEach(children => {
            children.addEventListener('click', (e) => {
                productDetails.src = e.target.src;
            })
        });
    </script>
@endpush
