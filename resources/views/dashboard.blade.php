<x-app-layout>
    @push('scripts')
    <script type="text/javascript">
        window.spots = @json($spots);
    </script>
    @vite('resources/js/googlemapsAPI/main.js')
    @endpush
    <div class="relative z-10 w-[320px] lg:w-[520px] top-[74px] left-1/2 -translate-x-1/2">
        <input
            id="address"
            type="textbox"
            placeholder="住所を入力"
            method="POST"
            class="h-[40px] w-full rounded-full pl-4 pr-[140px]">

        <div class="absolute right-1 top-1/2 flex -translate-y-1/2 gap-1">
            <button
                type="button"
                id="searchSubmit"

                class="rounded-full bg-blue-600 px-4 py-1 text-sm font-medium text-white">
                検索
            </button>
        </div>
    </div>
    <div id="map" class="absolute top-[64px] right-[0px] h-[864px] w-full "></div>
    <!-- <pre>{{ json_encode($spots, JSON_PRETTY_PRINT) }}</pre> -->
</x-app-layout>