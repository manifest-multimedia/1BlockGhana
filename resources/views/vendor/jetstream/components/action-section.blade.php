<div class="row" {{ $attributes }}>
    <div class="col-md-4">
        <x-jet-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-jet-section-title>
    </div>

    <div class="col-md-8">
        <div class="mb-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                {{ $content }} 
            </div>
        </div>
    </div>
</div>
