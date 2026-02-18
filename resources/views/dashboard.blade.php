<x-app-layout>
    @push('scripts')
    <script type="text/javascript">
        window.spots = @json($spots);
        console.log(window.spots);
    </script>
    @vite('resources/js/googlemapsAPI/main.js')
    @endpush
    <div class="relative z-10 w-[320px] lg:w-[520px] top-[74px] left-1/2 -translate-x-1/2">
        <input
            id="address"
            type="textbox"
            placeholder="住所を入力"
            method="POST"
            class="h-[40px] w-full pl-4 pr-[140px]border-gray-300 focus:border-btn focus:ring-btn rounded-md shadow-sm">
        <div class="absolute right-1 top-1/2 flex -translate-y-1/2 gap-1">
            <button
                type="button"
                id="searchSubmit"
                class="rounded-full bg-btn px-4 py-1 text-sm font-medium text-white">
                検索
            </button>
        </div>
    </div>
    <div id="map" class="absolute top-[64px] right-[0px] h-[864px] w-full "></div>

    <section id="sidebar" class="fixed top-0 left-0 bg-main z-50 h-screen w-90 shadow-2xl transition-transform duration-300 -translate-x-full">
        <div class="flex items-center justify-end">
            <button id="close-btn" class="text-btn hover:bg-gray-200 rounded-lg p-2">
                ✕
            </button>
        </div>
        <div class="container">
            <div class="relative px-4 sm:px-6 lg:px-8">
                <div class="relative mx-auto max-w-7xl">
                    <div class="mx-auto grid max-w-lg gap-5 lg:max-w-none">
                        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                            <div class="shrink-0">
                                <img src="https://dummyimage.com/400x300/000/fff" alt="">
                            </div>
                            <div class="flex flex-1 flex-col justify-between bg-white p-6">
                                <div class="flex-1">
                                    title
                                    title_description
                                    <p class="font-bold">スポットの詳細</p>
                                </div>
                                <div class="mt-6 flex items-center">
                                    <div class="ml-3">
                                        投稿者
                                        投稿時間
                                        <div class="flex space-x-1 text-sm text-gray-500">
                                            <time datetime="2020-03-16"> Mar 16, 2020 </time>
                                            <span aria-hidden="true"> · </span>
                                            <span> 6 min read </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>