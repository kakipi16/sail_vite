import { createSpotInfoContent } from "./uiService.js";

export async function renderSpots(spots, map, infoWindow) {
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const { InfoWindow } = await google.maps.importLibrary("maps");

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
        });
    });
}