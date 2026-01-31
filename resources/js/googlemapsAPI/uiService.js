export function createPostInfoWindow() {
    const container = document.createElement("div");
    container.innerHTML = `
    <h1 class="text-lg font-bold mb-2">スポットを追加しよう</h1>
    <button
        id="submitBtn"
        class="rounded-full bg-blue-600 px-4 py-1 text-sm font-medium text-white"
    >
    <a href = "/googlemapsForm">投稿</a>
    </button>
    `;
    return container;
}