<x-app-layout>
    <main class=" w-full min-h-[calc(100vh-80px-80px)] flex items-center justify-center">
        <div class="min-h-scree flex items-center justify-center p-4">
            <div class="w-full max-w-md sm:max-w-xl md:max-w-2xl bg-white rounded-2xl shadow-lg">
                <img class="aspect-video  rounded-t-2xl object-cover object-center" src="https://dummyimage.com/800x400/000/ffffff" />
                <div class="p-6">
                    <small class="text-gray-900 text-xs">投稿者 : {{ $spotPost->user->name}}</small>
                    <h1 class="text-2xl font-bold text-gray-700 pb-2 ">{{ $spotPost->spotTitle }}</h1>
                    <p class="text text-gray-500 leading-6">
                        {{ $spotPost->spotDesc}}
                    </p>
                    <div class="flex items-center justify-center gap-20 pt-8">
                        <x-back-home-button>
                            {{ __('ホーム') }}
                        </x-back-home-button>
                        <x-postList-button>
                            {{ __('投稿一覧') }}
                        </x-postList-button>
                    </div>
                </div>
            </div>

        </div>
    </main>
</x-app-layout>