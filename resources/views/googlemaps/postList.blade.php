<x-app-layout>
    <div class="py-8 flex flex-col justify-center items-center">
        <div class="relative mb-8">
            <div class="relative flex justify-start">
                <span class="pr-3 text-lg font-medium text-gray-600">
                    投稿一覧
                </span>
            </div>
        </div>
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message')}}
        </div>
        @endif
        <div class="space-y-8 lg:divide-y lg:divide-gray-100 w-full md:max-w-md lg:max-w-2xl xl:max-w-5xl">
            @foreach ($postLists as $postList)
            <div class="group/card flex relative h-[600px] lg:h-[200px] overflow-hidden flex-col lg:flex-row items-center  rounded-lg shadow-lg hover:bg-gray-100">
                <div class=" h-[300px] lg:w-[200px] lg:h-[200px] mb-4 shrink-0 md:mb-0 lg:mr-3">
                    <img class="h-full w-full rounded-md object-center lg:object-cover" src="{{ asset('storage/' . $postList->imag_url) }}" alt="{{$postList->spotTitle}}" />
                </div>
                <div class="h-full w-full flex flex-col justify-center items-start">
                    <span class="text-sm text-gray-500">投稿者：{{ $postList->user->name}}</span>
                    <p class="mt-3 text-lg font-medium leading-6">
                        <!-- ここを修正する　z-indexをボタンに付与できるようにする。 -->
                        <a href="{{ route('googlemaps.show',$postList->id) }}" class="text-xl text-gray-800  lg:text-2xl after:absolute after:inset-0 after:z-10">
                            {{$postList->spotTitle}}
                        </a>
                    </p>
                    <p class="mt-2 text-lg text-gray-500 break-words truncate">
                        {{$postList->spotDesc}}
                    </p>
                    @if ($user_id == $postList->user_id)
                    <div class="mb-4 text-center" style="margin-top:10px">
                        <a href="{{ route('spotPost.edit', $postList) }}" class="relative z-20 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-2" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                            編集する
                        </a>
                        <form
                            style="display: inline-block;"
                            method="POST"
                            action="{{ route('spotPost.destroy',$postList) }}">
                            @csrf
                            @method('delete')
                            <x-delete-btn>削除する</x-delete-btn>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>