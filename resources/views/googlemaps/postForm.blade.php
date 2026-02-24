<x-app-layout>
    <div class=" w-full min-h-[calc(100vh-80px-80px)] flex items-center justify-center">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form id="SpotForm" method="POST" action="{{ route('SpotStore') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mt-4">
                    <x-title>スポットを投稿する</x-title>
                    <x-title_description>あなたのおすすめスポットを他の旅行者と共有しましょう</x-title_description>
                </div>

                <!-- hidden（座標用） -->
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">
                <!-- image_url -->
                <div class="mt-4">
                    <label for="image">画像アップロード</label>
                    <input type="file" name="image" id="image">
                </div>

                <!-- spotTitle -->
                <div class="mt-6">
                    <div class="flex justify-between">
                        <x-input-label for="spotTitle" :value="__('スポット名')" />
                        <x-input-label for="spotTitle" class="text-red-600" :value="__('必須')" />
                    </div>
                    <x-text-input id="spotTitle" class="block mt-1 w-full" type="text" name="spotTitle" :value="old('spotTitle')" required autofocus />
                    <x-input-error :messages="$errors->get('spotTitle')" class="mt-2" />
                </div>


                <!-- Spot Description -->
                <div class="mt-4">
                    <div class="flex justify-between">
                        <x-input-label for="spotDesc" :value="__('スポット説明')" />
                        <x-input-label for="spotDesc" class="text-gray-400" :value="__('任意')" />
                    </div>
                    <x-textarea id="spotDesc" class="block mt-1 w-full" type="textarea" name="spotDesc" :value="old('spotDesc')" required />
                    <x-input-error :messages="$errors->get('spotDesc')" class="mt-2" />
                </div>

                <!-- create button -->
                <div>
                    <div class="flex items-center justify-center mt-6 mb-4">
                        <x-back-home-button class="ms-4">
                            {{ __('キャンセル') }}
                        </x-back-home-button>
                        <x-submit-button class="ms-4 px-10">
                            {{ __('投稿する') }}
                        </x-submit-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>