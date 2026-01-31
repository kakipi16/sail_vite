import { createPostInfoWindow } from "./uiService.js";


const apiKey = import.meta.env.VITE_GOOGLE_MAP_API_KEY;
const mapId = import.meta.env.VITE_GOOGLE_MAP_ID;
let map;
let infoWindow;
let marker;
let searchMarker;
let clickMarker;
let geocoder;

async function initMap() {
    //DOM操作
    const mapElement = document.getElementById("map");
    const inputText = document.getElementById("address");
    const submitButton = document.getElementById("searchSubmit");

    //必要なライブラリの読み込み
    const { Map } = await google.maps.importLibrary("maps");
    const { InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary('marker');

    //PHPとJSON経由でデータベースから取得
    const spots = window.spots || [];

    //非同期のいらない呼び出し
    geocoder = new google.maps.Geocoder();
    infoWindow = new InfoWindow();

    //HTMLが読み込めないときに作動する
    if(!mapElement){
        console.error("map 要素が見つかりません");
        return;
    }

    //mapの生成と初期位置を設定
    map = new Map( mapElement, {
        center: { lat: 34.716216939136, lng: 137.65626712680375 },
        zoom: 10,
        mapId: mapId
    });

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
        infoMarker.addListener("click", () => {
            infoWindow.close();
            infoWindow.setContent(`
                <div>
                    <strong>${spot.spotTitle}</strong><br>
                    <p>${spot.spotDesc}</p>
                    <button id="submitBtn"><a href = "/show/${spot.id}">more</a></button>
                </div>
            `);
            infoWindow.open({
                anchor: infoMarker,
                map,
            });
        });
    });

    let currentMarker = null;
    map.addListener("click", async (e) => {
        if (currentMarker) {
            currentMarker.map = null;
        }

        currentMarker =  await createClickableMarker(e.latLng, map, infoWindow);
        //座標にIDを付与してをDBに格納したい。
        const lat = e.latLng.lat();
        const lng = e.latLng.lng();
        const coordinate = { lat, lng };
        localStorage.setItem("selectedCoordinate", JSON.stringify(coordinate));

        console.log("localStorageに保存", coordinate);

    });

    //
    searchMarker = new google.maps.Marker({
        map,
        gmpClickable: true,
    });

    submitButton.addEventListener("click", () =>
        geocode({ address: inputText.value }),
    );
}

function clear() {
    searchMarker.setMap(null);
}

function geocode(request) {
    clear();
    geocoder.geocode(request).then((result) => {
        const { results } = result;
        const lat = results[0].geometry.location.lat();
        const lng = results[0].geometry.location.lng();
        const coordinate = { lat, lng };

        map.setCenter(results[0].geometry.location);
        searchMarker.setPosition(results[0].geometry.location);
        searchMarker.setMap(map);
        localStorage.setItem("selectedCoordinate", JSON.stringify(coordinate));

        console.log("localStorageに保存", coordinate);

        infoWindow.setContent(createPostInfoWindow());
        infoWindow.open({ map, anchor: searchMarker });
        return results;
    })
    .catch((e) => {
        console.log("Geocode was not successful for the following reason: " + e);
    });
}

async function createClickableMarker(latLng, map, infoWindow) {
    const { AdvancedMarkerElement } = await google.maps.importLibrary('marker');

    clickMarker = new AdvancedMarkerElement({
        position: latLng,
        map,
        gmpClickable: true,
    });

    map.panTo(latLng);
        infoWindow.close();
        infoWindow.setContent(createPostInfoWindow());
        infoWindow.open({ map, anchor: clickMarker });

    return clickMarker;
}

window.initMap = initMap;

// Google Mapsと Geocode スクリプトを読み込み
const script = document.createElement("script");
script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap&libraries=maps,marker`;
script.async = true;
document.head.appendChild(script);
