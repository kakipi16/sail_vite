@props(['disabled' => false])

<textarea @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-btn focus:ring-btn rounded-md shadow-sm']) }}>{{ $slot }}</textarea>