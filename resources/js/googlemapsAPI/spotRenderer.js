import { createPostSidebar } from "./uiService.js";

export async function renderSpots(map) {
    try {
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        const sidebar = document.getElementById('sidebar');
        const response = await fetch('api/posts');
        const data = await response.json();

        if(data.status) {
            data.spotPosts.forEach((spot) => {
                
                const marker = new AdvancedMarkerElement({
                    map,
                    position: {
                        lat: Number(spot.latitude),
                        lng: Number(spot.longitude),
                    },
                    gmpClickable: true,
                });

                marker.addListener("click", () => {
                    sidebar.innerHTML = ``
                    const content = createPostSidebar(spot);
                    sidebar.appendChild(content);
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    const closeBtn = document.getElementById('close-btn');
                    closeBtn.addEventListener('click', () => {
                        sidebar.classList.remove('translate-x-0');
                        sidebar.classList.add('-translate-x-full');
                    });
                });

            });
        }
        
    } catch {
        alert("スポットの取得に失敗しました。")
    }

}