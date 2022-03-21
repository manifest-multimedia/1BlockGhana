<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary btn-round']) }}>
    {{ $slot }}
</button>
