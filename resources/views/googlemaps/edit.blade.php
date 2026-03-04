<x-app-layout>
    <div class=" w-full min-h-[calc(100vh-80px-80px)] flex items-center justify-center">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form id="" method="POST" action="{{ route('spotPost.update', $spotPost) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="flex flex-col mt-4">
                    <x-title>スポットを更新する</x-title>
                </div>
                <!-- image_url -->
                <div class="mt-4">
                    <x-input-label for="image" :value="__('画像アップロード')" />
                    <input type="file" name="image" id="image">
                </div>

                <!-- spotTitle -->
                <div class="mt-6">
                    <div class="flex justify-between">
                        <x-input-label for="spotTitle" :value="__('スポット名')" />
                        <x-input-label for="spotDesc" class="text-gray-400" :value="__('任意')" />
                    </div>
                    <x-text-input id="spotTitle" class="block mt-1 w-full" type="text" name="spotTitle" :value="old('spotTitle')" autofocus />
                    <x-input-error :messages="$errors->get('spotTitle')" class="mt-2" />
                </div>


                <!-- Spot Description -->
                <div class="mt-4">
                    <div class="flex justify-between">
                        <x-input-label for="spotDesc" :value="__('スポット説明')" />
                        <x-input-label for="spotDesc" class="text-gray-400" :value="__('任意')" />
                    </div>
                    <x-textarea id="spotDesc" class="block mt-1 w-full" type="textarea" name="spotDesc" :value="old('spotDesc')" />
                    <x-input-error :messages="$errors->get('spotDesc')" class="mt-2" />
                </div>

                <!-- create button -->
                <div>
                    <div class="flex items-center justify-center mt-6 mb-4">
                        <x-postList-button>
                            {{ __('投稿一覧') }}
                        </x-postList-button>
                        <x-submit-button class="ms-4 py-3.5 px-[44px]">
                            {{ __('更新') }}
                        </x-submit-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>