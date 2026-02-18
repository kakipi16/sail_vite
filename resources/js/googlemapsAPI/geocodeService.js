import { saveCoordinate } from "./coordinateStore.js";
import { createPostInfoWindow } from "./uiService";
import { clearSearchMarker } from "./markerManager";

export function geocodeAddress(geocoder, map, infoWindow, searchMarker, address) {
    clearSearchMarker();

    geocoder.geocode({ address }).then(({ results }) => {
        const loc = results[0].geometry.location;

        map.setCenter(loc);
        searchMarker.setPosition(loc);
        searchMarker.setMap(map);

        saveCoordinate(loc.lat(), loc.lng());

        infoWindow.setContent(createPostInfoWindow());
        infoWindow.open({ map, anchor: searchMarker });
    });
}
