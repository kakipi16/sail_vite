<x-app-layout>
    <main class=" w-full min-h-[calc(100vh-80px-80px)] flex items-center justify-center">
        <div class="w-full sm:w-[700px] h-[600px] bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div class="mx-auto">
                <img src="https://dummyimage.com/800x400/000/ffffff" alt="">
                <div class="px-6 py-4">
                    <div class="flex flex-col mt-8 mb-6">
                        <x-title>{{ $spotPost->spotTitle }}</x-title>
                        <!-- リレーションを作成してポストユーザー名を記入する。 -->
                        <small>投稿者 : {{ $spotPost->user->name}}</small>
                    </div>
                    <div>
                        <p class="font-bold">スポットの詳細</p>
                        <x-title_description>{{ $spotPost->spotDesc}}</x-title_description>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-app-layout>