<section class="h-full w-full bg-gray-100">

    <div class="mx-auto grid max-w-screen-xl grid-cols-2 gap-4 py-12 px-4">
        <div class="border border-gray-200 bg-white p-4">
            <form wire:submit.prevent="createOrder">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-forms.text-input title="Nombre *" value='' class="w-full" wire:model.defer='name'
                            id="name" name='name' />
                        @error('name')
                            <x-forms.error message='{{ $message }}' />
                        @enderror

                    </div>
                    <div>
                        <x-forms.text-input title="Apellido *" value='' class="w-full" wire:model.defer='lastName'
                            id="lastName" name='lastName' />
                        @error('lastName')
                            <x-forms.error message='{{ $message }}' />
                        @enderror
                    </div>
                </div>

                <div>
                    <x-forms.text-input title="Correo *" value='' class="w-full" containerClass='mt-4'
                        wire:model.defer='email' id="email" name='email' />
                    @error('email')
                        <x-forms.error message='{{ $message }}' />
                    @enderror
                </div>

                <div>
                    <x-forms.text-input title="Dirección *" value='' class="w-full" type="text"
                        containerClass='mt-4' wire:model.defer='address' id="address" name="address" />
                    @error('address')
                        <x-forms.error message='{{ $message }}' />
                    @enderror
                </div>

                <x-forms.text-input title="Apartamento, local, etc" value='' class="w-full" type="text"
                    containerClass='mt-4' wire:model.defer='optionalAddress' id="optionalAddress"
                    name="optionalAddress" />

                <x-forms.text-input title="Teléfono" value='' class="w-full" type="text" containerClass='mt-4'
                    wire:model.defer='phone' id="phone" name="phone" />

                <div wire:loading.class='opacity-50 pointer-events-none' wire:target="selectedDepartment"
                    class="transition-all duration-200">

                    <x-forms.select title="Departamento *" wire:model="selectedDepartment" id="selectedDepartment"
                        name="selectedDepartment" class="w-full" wire:model.defer='selectedDepartment'
                        containerClass='mt-4'>
                        <x-slot name="options">
                            <option value="0" selected disabled>Seleccionar</option>
                            @foreach ($departmentList as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </x-slot>
                    </x-forms.select>
                    @error('selectedDepartment')
                        <x-forms.error message='{{ $message }}' />
                    @enderror
                </div>

                <div wire:loading.class='opacity-50 pointer-events-none' wire:target="selectedDepartment, selectedCity"
                    class="transition-all duration-200">
                    <x-forms.select title="Ciudad *" wire:model="selectedCity" id="selectedCity" name="selectedCity"
                        class="w-full" wire:model.defer='selectedCity' containerClass='mt-4'>
                        <x-slot name="options">
                            <option value="0" selected disabled>Seleccionar</option>
                            @foreach ($cityList as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </x-slot>
                    </x-forms.select>
                    @error('selectedCity')
                        <x-forms.error message='{{ $message }}' />
                    @enderror
                </div>

                <div wire:loading.class='opacity-50 pointer-events-none' wire:target="selectedCity, selectedDistrict"
                    class="transition-all duration-200">
                    <x-forms.select title="Barrio *" wire:model="selectedDistrict" id="selectedDistrict"
                        name="selectedDistrict" class="w-full" wire:model.defer='selectedDistrict'
                        containerClass='mt-4'>
                        <x-slot name="options">
                            <option value="0" selected disabled>Seleccionar</option>
                            @foreach ($districtList as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </x-slot>
                    </x-forms.select>
                    @error('selectedDistrict')
                        <x-forms.error message='{{ $message }}' />
                    @enderror
                </div>

                <x-forms.text-area class="w-full resize-none" title="Datos adicionales" containerClass="mt-4"
                    wire:model.defer='optionalData' id="optionalData" name="optionalData">
                    <x-slot name="value">
                    </x-slot>
                </x-forms.text-area>

                <button
                    class='hover:text-primary mt-4 flex h-[50px] w-full transform select-none items-center justify-center bg-black px-3 text-white transition-all duration-300 hover:bg-black active:scale-[.97] disabled:cursor-pointer'
                    wire:loading.class="pointer-events-none" wire:target='createOrder' type="submit">

                    <span>
                        <svg width="122" height="122" viewBox="0 0 122 122" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6 animate-spin" wire:loading
                            wire:target='createOrder'>
                            <circle cx="61" cy="61" r="50" stroke="#e5e7eb" stroke-width="22"
                                stroke-opacity="0.5" />
                            <path
                                d="M111 61C111 71.0229 107.988 80.8144 102.354 89.1042C96.7203 97.3939 88.7253 103.799 79.4062 107.489C70.0872 111.178 59.8743 111.982 50.0928 109.796C40.3113 107.609 31.4127 102.534 24.5516 95.2274"
                                stroke="#e5e7eb" stroke-width="22" />
                        </svg>
                    </span>

                    <span wire:loading.remove wire:target='createOrder'>Continuar a envios</span>
                </button>

            </form>
        </div>

        <div class="h-fit border border-gray-200 bg-white py-4">
            @if (\Cart::getContent()->count() > 0)
                <div class="max-h-[710px] overflow-y-auto overflow-x-hidden px-4">
                    <table class="w-full">
                        @foreach (\Cart::getContent()->sortBy('id') as $item)
                            <tr class="group border-b border-gray-200 first:pt-0 last:border-b-0">
                                <th
                                    class="pt-3 pb-3 text-left font-normal text-gray-300 group-first:pt-0 group-last:pb-0">
                                    <img src="{{ $item->attributes->img }}" alt="{{ $item->name }}"
                                        class="h-auto w-20 object-cover">
                                </th>
                                <td class="pt-3 pb-3 pl-2 text-left group-first:pt-0 group-last:pb-0">
                                    <h3>{{ $item->name }}</h3>
                                    <p class="text-sm text-gray-300">
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
                                        <span
                                            class="block text-sm text-gray-300">{{ 'x ' . $item->quantity }}</span>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <div class="py-6 px-4 text-center text-gray-300">
                    <p>Aún no has agregado nada al carrito</p>
                </div>
            @endif

            <div class="mt-4 px-4">
                <p class="border-t border-gray-200 pt-3 text-sm text-black">
                    <span class="text-gray-300">Subtotal:</span> COP
                    {{ \Cart::getSubTotal() }}
                </p>
                <p class="text-sm">
                    <span class="text-gray-300">Envio:</span>
                    {{ $shippingCost }}
                </p>
                <p class="mt-3 border-t border-gray-200 pt-3 text-black">
                    <span class="text-gray-300">Total:</span> COP
                    {{ \Cart::getTotal() + $shippingCost }}
                </p>
            </div>
        </div>
    </div>

</section>
