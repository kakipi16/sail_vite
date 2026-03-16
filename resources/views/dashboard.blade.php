<x-app-layout>
    @push('scripts')
    <script type="text/javascript">
        window.spots = @json($spots);
        window.Laravel = {
            storageBase: "{{ asset('storage/') }}/"
        };
    </script>
    @vite('resources/js/googlemapsAPI/main.js')
    @endpush

    <div class="relative w-full overflow-hidden" style="height: calc(100vh - 145px);">

        <form id="searchForm" class="absolute z-20 w-[320px] lg:w-[520px] top-4 left-1/2 -translate-x-1/2">
            <div class="relative"> <input
                    id="address"
                    type="textbox"
                    placeholder="住所を入力"
                    class="h-[40px] w-full pl-4 pr-[80px] border-gray-300 focus:border-btn focus:ring-btn rounded-md shadow-lg">

                <div class="absolute right-1 top-1/2 -translate-y-1/2">
                    <button
                        type="submit"
                        id="searchSubmit"
                        class="rounded-full bg-btn px-4 py-1 text-sm font-medium text-white">
                        検索
                    </button>
                </div>
            </div>
        </form>

        <div id="map" class="h-full w-full"></div>

    </div>
    <section id="sidebar" class="fixed top-0 left-0 bg-main z-50 h-screen md:w-[480px] sm:w-[300px] shadow-2xl transition-transform duration-300 -translate-x-full overflow-y-auto">
    </section>

</x-app-layout>