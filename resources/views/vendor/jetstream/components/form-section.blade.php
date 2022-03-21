@props(['submit'])

<div {{ $attributes->merge(['class' => 'row']) }}>
    <div class="col-md-4">
        <x-jet-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }} this is des</x-slot>
        </x-jet-section-title>
    </div>

    <div class="col-md-8">
        <div class="card">
            <form wire:submit.prevent="{{ $submit }}">
                <div class="{{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }} body">
                    <div class="form-group">
                        {{ $form }}
                    </div>
                </div>
    
                @if (isset($actions))
                    <div class="col-sm-12">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
