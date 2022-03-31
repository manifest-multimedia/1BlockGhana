<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h5 class="text-md font-medium text-gray-900">{{ $title }}</h5>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
