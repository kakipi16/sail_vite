<x-app-layout>
    <main class=" w-full min-h-[calc(100vh-80px-80px)] flex items-center justify-center">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div class="mx-auto px-6">
                @foreach($posts as $post)
                    @if($post->id === 1)
                    <div class="flex flex-col mt-4">
                        <x-title>{{ $post->spotTitle }}</x-title>
                        <!-- リレーションを作成してポストユーザー名を記入する。 -->
                        <x-title_description>スポットの詳細</x-title_description>
                        <p>{{ $post->spotDesc}}</p>
                    </div>
                @endif
                @endforeach
            </div>
        </div>

    </main>
</x-app-layout>