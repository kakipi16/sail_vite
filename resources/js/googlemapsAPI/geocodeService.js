import { saveCoordinate } from "./coordinateStore.js";
import { createPostInfoWindow, createPostHeaderInfoWindow } from "./uiService.js";
import { clearSearchMarker } from "./markerManager.js";

export function geocodeAddress(geocoder, map, infoWindow, searchMarker, address) {
    clearSearchMarker();

    geocoder.geocode({ address }).then(({ results }) => {
        const loc = results[0].geometry.location;

        map.setCenter(loc);
        searchMarker.setPosition(loc);
        searchMarker.setMap(map);

        saveCoordinate(loc.lat(), loc.lng());

        infoWindow.setHeaderContent(createPostHeaderInfoWindow())
        infoWindow.setContent(createPostInfoWindow());
        infoWindow.open({ map, anchor: searchMarker });
    });
}
