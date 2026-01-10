<x-app-layout>
    @push('scripts')
    <script type="text/javascript">
        window.spots = @json($spots);
    </script>
    @vite('resources/js/googlemapsAPI/main.js')
    @endpush
    <div id="map" class="h-[778px] w-full "></div>
    <pre>{{ json_encode($spots, JSON_PRETTY_PRINT) }}</pre>
</x-app-layout>