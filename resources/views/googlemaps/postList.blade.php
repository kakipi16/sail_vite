<x-app-layout>
    <div class="py-8 flex flex-col justify-center items-center">
        <div class="relative mb-8">
            <div class="relative flex justify-start">
                <span class="pr-3 text-3xl font-medium text-gray-600">
                    投稿一覧
                </span>
            </div>
        </div>
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message')}}
        </div>
        @endif
        <div class="space-y-8 lg:divide-y lg:divide-gray-100 max-w-md lg:max-w-2xl xl:max-w-5xl">
            @foreach ($postLists as $postList)
            <div class="group/card flex relative h-auto sm:min-h-[400px] lg:min-h-[200px] overflow-hidden flex-col lg:flex-row items-center rounded-lg shadow-lg hover:bg-gray-100">
                <div class=" h-[300px] lg:w-[200px] lg:h-[200px] mb-4 shrink-0 lg:mb-0 lg:mr-3">
                    <img class="h-full w-full rounded-md object-center lg:object-cover" src="{{ asset('storage/' . $postList->imag_url) }}" alt="{{$postList->spotTitle}}" />
                </div>
                <div class="w-full flex flex-col justify-center items-start">
                    <span class="text-sm text-gray-500">投稿者：{{ $postList->user->name}}</span>
                    <p class="mt-3 text-lg font-medium leading-6">
                        <!-- ここを修正する z-indexをボタンに付与できるようにする。 -->
                        <a href="{{ route('googlemaps.show',$postList->id) }}" class="text-2xl text-gray-800  lg:text-2xl after:absolute after:inset-0 after:z-10">
                            {{$postList->spotTitle}}
                        </a>
                    </p>
                    <div class="w-5/6">
                        <p class="mt-2 text-base text-gray-500 break-words lg:line-clamp-1 line-clamp-3 overflow-hidden">
                            {{$postList->spotDesc}}
                        </p>
                    </div>
                    @if ($user_id == $postList->user_id)
                    <div class="mb-4 text-center" style="margin-top:10px">

                        <a href="{{ route('spotPost.edit', $postList) }}" class="inline-flex items-center z-20 rounded-md px-4 py-2 m-1 overflow-hidden relative group cursor-pointer border-2 font-medium border-blue-600 ">
                            <span class="absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-blue-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
                            <span class="relative text-blue-600 transition duration-300 group-hover:text-white ease">編集する</span>
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