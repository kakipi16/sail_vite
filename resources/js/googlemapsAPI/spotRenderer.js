import { createSpotInfoContent, createPostSidebar } from "./uiService.js";

export async function renderSpots(spots, map, infoWindow) {
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const { InfoWindow } = await google.maps.importLibrary("maps");
    const sidebar = document.getElementById('sidebar');

    infoWindow = new InfoWindow();

    spots.forEach((spot) => {
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