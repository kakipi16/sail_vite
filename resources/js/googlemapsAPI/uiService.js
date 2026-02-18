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
    <h1 class="text-lg font-bold mb-2">スポットを追加しよう</h1>
        <a
            href = "/googlemapsForm"
            class="rounded-full bg-btn px-4 py-1 text-sm font-medium text-white"
        >投稿</a>
    `;
    return container;
}