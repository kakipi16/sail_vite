<x-app-layout>
    <section>
        <div class="container py-8 mx-auto">
            <div class="relative mb-8">
                <div class="relative flex justify-start">
                    <span class="pr-3 text-lg font-medium text-gray-600">
                        投稿一覧
                    </span>
                </div>
            </div>
            <div class="space-y-8 lg:divide-y lg:divide-gray-100 xl:max-w-6xl">
                @foreach ($postLists as $postList)
                <div class="group sm:flex lg:items-end rounded-lg shadow-lg  sm:min-w-sm">
                    <div class="mb-4 shrink-0 sm:mb-0 sm:mr-4">
                        <img class="h-32 w-full rounded-md object-cover lg:w-32" src="https://dummyimage.com/400x300/000/fff" alt="text" />
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">投稿者：{{ $postList->user->name}}</span>
                        <p class="mt-3 text-lg font-medium leading-6">
                            <a href="{{ route('googlemaps.show',$postList->id) }}" class="text-xl text-gray-800 group-hover:text-gray-500 lg:text-2xl">
                                {{$postList->spotTitle}}
                            </a>
                        </p>
                        <p class="mt-2 text-lg text-gray-500">
                            {{$postList->spotDesc}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>