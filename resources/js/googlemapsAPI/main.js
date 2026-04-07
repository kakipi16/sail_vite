import { createPostInfoWindow, createPostHeaderInfoWindow } from "./uiService.js"
import { saveCoordinate } from "./coordinateStore.js";
import { createSearchMarker, createClickMarker } from "./markerManager.js";
import { renderSpots } from "./spotRenderer.js";
import { geocodeAddress } from "./geocodeService.js";

const mapId = window.googleMapId;
let map;
let infoWindow;
let geocoder;

async function initMap() {
    //DOM操作
    const mapElement = document.getElementById("map");
    const searchForm = document.getElementById("searchForm");
    const inputText = document.getElementById("address");

    //必要なライブラリの読み込み
    const { Map } = await google.maps.importLibrary("maps");
    const { InfoWindow } = await google.maps.importLibrary("maps");
    infoWindow = new InfoWindow();
    const searchMarker = createSearchMarker(map);
    
    //mapの生成と初期位置を設定
    map = new Map( mapElement, {
        center: { lat: 34.716216939136, lng: 137.65626712680375 },
        zoom: 10,
        mapId: mapId
    });
    renderSpots(map);

    map.addListener("click", async (e) => {
        const marker = await createClickMarker(e.latLng, map);
        saveCoordinate(e.latLng.lat(), e.latLng.lng());
        infoWindow.setHeaderContent(createPostHeaderInfoWindow())
        infoWindow.setContent(createPostInfoWindow());
        infoWindow.open({ map, anchor: marker });
    });
    //非同期のいらない呼び出し
    geocoder = new google.maps.Geocoder();

    //HTMLが読み込めないときに作動する
    if(!mapElement){
        console.error("map 要素が見つかりません");
        return;
    }

    searchForm.addEventListener("submit", (e) =>{
        e.preventDefault();
        geocodeAddress(geocoder, map, infoWindow, searchMarker, inputText.value);
    });
}

window.initMap = initMap;

if (typeof google !== 'undefined' && google.maps && google.maps.importLibrary) {
    initMap();
}