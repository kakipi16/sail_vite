import { createSpotInfoContent } from "./uiService.js";

export async function renderSpots(spots, map, infoWindow) {
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const { InfoWindow } = await google.maps.importLibrary("maps");
    const sidebar = document.getElementById('sidebar');
    const closeBtn = document.getElementById('close-btn');

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
            infoWindow.setContent(createSpotInfoContent(spot));
            infoWindow.open({ map, anchor: marker });
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
        });
    });
    closeBtn.addEventListener('click', () => {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
    });
}