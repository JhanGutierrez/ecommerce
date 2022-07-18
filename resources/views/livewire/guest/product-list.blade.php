<section>

    <header
        class="mt-[70px] h-[200px] bg-black bg-[url('https://images.unsplash.com/photo-1631877897776-0e2f51654834?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-fixed bg-center bg-no-repeat">
        <div class="mx-auto flex h-full w-full max-w-screen-xl items-center p-4">
            <h1 class="text-4xl font-bold text-white">{{ $category->name }}</h1>
        </div>
    </header>

    <div
        class="mx-auto grid h-full max-w-screen-xl grid-cols-1 gap-4 px-4 lg:min-h-[calc(100vh-142px)] lg:grid-cols-[280px,1fr]">

        <!-- FILTERS PANEL -->
        <aside class="relative h-full border-r border-gray-300 bg-white py-10 pr-4 lg:block">

            <h2 class="pb-4 text-3xl font-bold">Filtros</h2>

            <!--#region Subcategories  -->
            <x-forms.select title="Subcategoria" id="subcategory"
                onchange="top.location.href = this.options[this.selectedIndex].value">

                <x-slot name='options'>
                    @foreach ($subcategories as $data)
                        <option value="{{ route('products.category.subcategory', [$category, $data->id]) }}"
                            {{ $data->id == $subcategory ? 'selected' : '' }}>
                            {{ $data->name }}
                        </option>
                    @endforeach
                    <option value="{{ route('products.category', $category) }}"
                        {{ $subcategory == null ? 'selected' : '' }}>
                        Todas
                    </option>
                </x-slot>

            </x-forms.select>
            <!--#endregion -->

            <!--#region Brands  -->
            @if (count($brands) > 0)
                <div class="mt-6 border-t border-gray-200 pt-3 filter">
                    <h3 class="block pb-1 text-lg font-bold">Marca</h3>
                    <ul class="h-full max-h-[192px] overflow-auto">
                        @foreach ($brands as $brand)
                            <li class="checkbox pb-1 last:pb-0">
                                <input type="checkbox" id="brand-{{ $brand->id }}" value="{{ $brand->id }}"
                                    name="{{ $brand->name }}" wire:model='selectedBrands'>
                                <label for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--#endregion -->

            <!--#region Sizes  -->
            @if (count($sizes) > 0)
                <div class="mt-6 border-t border-gray-200 pt-3 filter">
                    <h3 class="block pb-1 text-lg font-bold">Talla</h3>
                    <ul class="max-h-[192px] overflow-y-auto overflow-x-hidden">
                        @foreach ($sizes as $size)
                            <li class="checkbox mb-1 last:mb-0">
                                <input type="checkbox" id="{{ 'size-' . $size->id }}" value="{{ $size->id }}"
                                    name="{{ $size->name }}" wire:model='selectedSizes'>
                                <label for="{{ 'size-' . $size->id }}">{{ $size->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--#endregion -->


            <!--#region Colors  -->
            @if (count($colors) > 0)
                <div class="mt-6 border-t border-gray-200 pt-3 filter">
                    <h3 class="block pb-1 text-lg font-bold">Color</h3>
                    <ul class="flex flex-wrap">
                        @foreach ($colors as $color)
                            <li>
                                <x-forms.color-checkbox id="{{ $color->id }}" colorHex="{{ $color->color_hex }}"
                                    wire:model='selectedColors' />
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--#endregion -->

        </aside>

        <!-- PRODUCTS PANEL -->
        <section class="relative h-full py-10">

            <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                @foreach ($products as $product)
                    <x-guest.grid-product-card uri="{{ route('product.details', $product) }}"
                        img1="{{ Storage::url($product->img_1) }}" img2="{{ Storage::url($product->img_2) }}"
                        productName="{{ $product->name }}" productPrice="{{ $product->price }}" />
                @endforeach
            </ul>

        </section>

    </div>
</section>
