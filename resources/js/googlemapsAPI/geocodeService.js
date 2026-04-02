import { saveCoordinate } from "./coordinateStore.js";
import { createPostInfoWindow, createPostHeaderInfoWindow } from "./uiService.js";
import { clearSearchMarker } from "./markerManager.js";

export function geocodeAddress(geocoder, map, infoWindow, searchMarker, address) {
    clearSearchMarker();

    geocoder.geocode({ address }).then(({ results }) => {
        const location = results[0].geometry.location;
        map.setCenter(location);
        searchMarker.setPosition(location);
        searchMarker.setMap(map);

        saveCoordinate(location.lat(), location.lng());

        infoWindow.setHeaderContent(createPostHeaderInfoWindow())
        infoWindow.setContent(createPostInfoWindow());
        infoWindow.open({ map, anchor: searchMarker });
    });
}
