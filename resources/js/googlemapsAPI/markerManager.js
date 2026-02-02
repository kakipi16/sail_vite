let currentMarker = null;
let searchMarker = null;

export function createSearchMarker(map) {
    searchMarker = new google.maps.Marker({ map });
    return searchMarker;
}

export function clearSearchMarker() {
    if (searchMarker) searchMarker.setMap(null);
}

export async function createClickMarker(latLng, map) {
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    if (currentMarker) currentMarker.map = null;

    currentMarker = new AdvancedMarkerElement({
        position: latLng,
        map,
        gmpClickable: true,
    });

    return currentMarker;
}
