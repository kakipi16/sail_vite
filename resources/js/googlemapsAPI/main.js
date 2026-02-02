import { createPostInfoWindow, createSpotInfoContent } from "./uiService.js"
import { saveCoordinate } from "./coordinateStore.js";
import { createSearchMarker, createClickMarker } from "./markerManager.js";
import { renderSpots } from "./spotRenderer.js";
import { geocodeAddress } from "./geocodeService.js";

const apiKey = import.meta.env.VITE_GOOGLE_MAP_API_KEY;
const mapId = import.meta.env.VITE_GOOGLE_MAP_ID;
let map;
let infoWindow;
let marker;
let geocoder;

async function initMap() {
    //DOM操作
    const mapElement = document.getElementById("map");
    const inputText = document.getElementById("address");
    const submitButton = document.getElementById("searchSubmit");
    //PHPとJSON経由でデータベースから取得
    const spots = window.spots || [];

    //必要なライブラリの読み込み
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary('marker');

    renderSpots(spots, map, infoWindow);

    const searchMarker = createSearchMarker(map);

    //mapの生成と初期位置を設定
    map = new Map( mapElement, {
        center: { lat: 34.716216939136, lng: 137.65626712680375 },
        zoom: 10,
        mapId: mapId
    });

    map.addListener("click", async (e) => {
        const marker = await createClickMarker(e.latLng, map);
        saveCoordinate(e.latLng.lat(), e.latLng.lng());

        infoWindow.setContent(createPostInfoWindow());
        infoWindow.open({ map, anchor: marker });
    });

    //HTMLが読み込めないときに作動する
    if(!mapElement){
        console.error("map 要素が見つかりません");
        return;
    }


    //PHPからspotの引数で、データベースのデータを取得
    spots.forEach((spot) => {
        const lat = Number(spot.latitude);
        const lng = Number(spot.longitude);
        if (isNaN(lat) || isNaN(lng)) return;

        const infoMarker = new AdvancedMarkerElement({
            map,
            position: { lat, lng },
            title: spot.spotTitle,
            gmpClickable: true,
        });

        //マーカーのクリック対応とwindowの表示
        infoMarker.addListener("click", (e) => {
            infoWindow.close();
            infoWindow.setContent(createSpotInfoContent(spot));
            infoWindow.open({
                anchor: infoMarker,
                map,
            });
        });
    });

    submitButton.addEventListener("click", () =>
        geocodeAddress(geocoder, map, infoWindow, searchMarker, inputText.value),
    );
}

window.initMap = initMap;

// Google Mapsと Geocode スクリプトを読み込み
const script = document.createElement("script");
script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap&libraries=maps,marker`;
script.async = true;
document.head.appendChild(script);
