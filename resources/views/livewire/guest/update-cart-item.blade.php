<div class="relative m-auto w-fit transition-all duration-200" wire:loading.class='opacity-25 pointer-events-none'
    wire:target="addQty, removeQty, qty">
    <span class="absolute top-0 left-0 flex h-full w-[40px] cursor-pointer select-none items-center justify-center"
        wire:click="removeQty">&#8722</span>
    <input type="number"
        class="block h-[49px] w-[120px] appearance-none border border-black bg-transparent px-11 text-center focus:outline-0"
        value="{{ $qty }}" wire:model.lazy='qty'>
    <span class="absolute right-0 top-0 flex h-full w-[40px] cursor-pointer select-none items-center justify-center"
        wire:click="addQty">&#43</span>
</div>
