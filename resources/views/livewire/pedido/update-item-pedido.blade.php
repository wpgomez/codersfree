<td class="p-4 whitespace-nowrap text-right text-sm text-gray-500">
    <div class="flex items-center" x-data>
        <x-jet-secondary-button
            disabled 
            x-bind:disabled="$wire.qty04 <= 1" 
            wire:loading.attr="disabled" 
            wire:target="decrement('04')"
            wire:click="decrement('04')">
            -
        </x-jet-secondary-button>

        <span class="mx-2 text-gray-700">{{$qty04}}</span>

        <x-jet-secondary-button
            wire:loading.attr="disabled" 
            wire:target="increment('04')"
            wire:click="increment('04')">
            +
        </x-jet-secondary-button>
    </div>
</td>
<td class="p-4 whitespace-nowrap text-right text-sm text-gray-500">
    <div class="flex items-center" x-data>
        <x-jet-secondary-button
            disabled 
            x-bind:disabled="$wire.qty06 <= 1" 
            wire:loading.attr="disabled" 
            wire:target="decrement('06')"
            wire:click="decrement('06')">
            -
        </x-jet-secondary-button>

        <span class="mx-2 text-gray-700">{{$qty06}}</span>

        <x-jet-secondary-button
            wire:loading.attr="disabled" 
            wire:target="increment('06')"
            wire:click="increment('06')">
            +
        </x-jet-secondary-button>
    </div>
</td>
