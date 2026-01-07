<x-app-layout>
    <main class=" w-full min-h-[calc(100vh-80px-80px)] flex items-center justify-center">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form id="SpotForm" method="POST" action="{{ route('SpotStore') }}">
                @csrf
                <div class="flex flex-col mt-4">
                    <x-title>スポットを投稿する</x-title>
                    <x-title_description>あなたのおすすめスポットを他の旅行者と共有しましょう</x-title_description>
                </div>
                <!-- spotTitle -->
                <div class="mt-6">
                    <div class="flex justify-between">
                        <x-input-label for="spotTitle" :value="__('スポット名')" />
                        <x-input-label for="spotTitle" class="text-[#DC2626]" :value="__('必須')" />
                    </div>
                    <x-text-input id="spotTitle" class="block mt-1 w-full" type="text" name="spotTitle" :value="old('spotTitle')" required autofocus />
                    <x-input-error :messages="$errors->get('spotTitle')" class="mt-2" />
                </div>


                <!-- Spot Description -->
                <div class="mt-4">
                    <div class="flex justify-between">
                        <x-input-label for="spotDesc" :value="__('スポット説明')" />
                        <x-input-label for="spotDesc" class="text-[#6B7280]" :value="__('任意')" />
                    </div>
                    <x-text-input id="spotDesc" class="block mt-1 w-full" type="text" name="spotDesc" :value="old('spotDesc')" required />
                    <x-input-error :messages="$errors->get('spotDesc')" class="mt-2" />
                </div>
                <!-- 34.63782273759663, 137.76821325948802 -->
                <!-- Spot Location -->
                <!-- <input type="" name="lat" value="{{ request('lat') }}">
                <input type="" name="lng" value="{{ request('lng') }}"> -->

                <!-- create button -->
                <div class="flex">
                    <div class="flex items-center justify-center mt-6 mb-4">
                        <x-back-home-button class="ms-4">
                            {{ __('キャンセル') }}
                        </x-back-home-button>
                    </div>
                    <div class="flex items-center justify-center mt-6 mb-4">
                        <x-primary-button class="ms-4">
                            {{ __('投稿する') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>