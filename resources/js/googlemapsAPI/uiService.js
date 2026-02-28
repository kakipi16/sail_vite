export function createSpotInfoContent(spot) {
    const container = document.createElement("div");
    container.innerHTML =`
        <h1 class="text-lg font-bold mb-2">${spot.spotTitle}</h1>
        <p>${spot.spotDesc}</p>
        <a
            href="/show/${spot.id}"
            class="rounded-full bg-btn px-4 py-1 text-sm font-medium text-white"
        >詳細</a>
    `;
    return container;
}


export function createPostInfoWindow() {
    const container = document.createElement("div");
    container.innerHTML = `
    <h1 class="text-lg font-bold mb-1">スポットを追加しよう</h1>
        <a
            href = "/googlemapsForm"
            class="rounded-full bg-btn px-2 py-1 text-sm font-medium text-white"
        >投稿</a>
    `;
    return container;
}

export function createPostSidebar(spot) {
    const container = document.createElement("div");
    const userName = spot.user ? spot.user.name : '不明なユーザー';
    const imageUrl = window.Laravel.storageBase + spot.imag_url;
    container.innerHTML = `
        <div class="flex items-center justify-end">
            <button id="close-btn" class="text-btn hover:bg-gray-200 rounded-lg p-2">
                ✕
            </button>
        </div>
        <div class="m-10">
            <div class="group relative flex w-[400px] flex-col rounded-2xl bg-white shadow-lg transition-all duration-300 hover:bg-gray-200 hover:shadow-2xl hover:-translate-y-1 cursor-pointer">
                <div class="w-full overflow-hidden rounded-t-2xl">
                    <img class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-110" src=${imageUrl} alt="${spot.spotTitle}" />
                </div>
                <div class="p-6">
                    <span class="text-sm font-medium text-gray-400">投稿者：${userName}</span>
                    <h3 class="mt-2 text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                        <a href="/show/${spot.id}" class="after:absolute after:inset-0 after:z-10">
                            ${spot.spotTitle}
                        </a>
                    </h3>
                    <p class="mt-3 text-base text-gray-600">${spot.spotDesc}</p>
                </div>
            </div>
        </div>
    `
    return container;
}