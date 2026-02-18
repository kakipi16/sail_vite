<a
    href="{{ route('dashboard') }}"
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-700'
    ]) }}>
    {{ $slot }}
</a>