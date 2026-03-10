<x-app-layout>
    <main class=" w-full min-h-[calc(100vh-80px-80px)] flex items-center justify-center">
        <div class="min-h-scree flex items-center justify-center">
            <form id="SpotForm" method="POST" action="{{ route('SpotStore') }}" enctype="multipart/form-data" class="w-[640px] max-w-md sm:max-w-xl md:max-w-2xl bg-white rounded-2xl shadow-lg p-6">
                @csrf
                <div class="flex flex-col mt-4">
                    <x-title>スポットを投稿する</x-title>
                    <x-title_description>あなたのおすすめスポットを他の旅行者と共有しましょう</x-title_description>
                </div>

                <!-- hidden（座標用） -->
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">

                <!-- image_url -->
                <div class="mt-4 ">
                    <div class="flex justify-between">
                        <x-input-label for="image" :value="__('画像アップロード')" />
                        <x-input-label for="spotTitle" class="text-red-600" :value="__('必須')" />
                    </div>

                    <div class="mt-1 flex items-start">
                        <input type="file" name="image" id="imageUpload" accept="image/*" class="hidden">
                        <button id="imageButton" type="button" class="mt-1 inline-flex items-center justify-center w-full px-3 py-2 text-base font-bold leading-6 text-white bg-btn border border-transparent rounded-full md:w-auto hover:bg-btn-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">画像を選択</button>
                        <img id="img" class="ml-2 h-[160px] w-[240px] object-scale-down border-none mt-2 bg-gray-100"
                        >
                    </div>

                </div>

                <!-- spotTitle -->
                <div class="mt-4">
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
                    <x-textarea id="spotDesc" class="block mt-1 w-full h-40" type="textarea" name="spotDesc" :value="old('spotDesc')" required />
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
    </main>
</x-app-layout>