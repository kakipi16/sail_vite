<x-app-layout>
    @push('scripts')
    @vite('resources/js/googlemapsAPI/main.js')
    @endpush
    <div id="map" class="h-[778px] w-full "></div>
</x-app-layout>