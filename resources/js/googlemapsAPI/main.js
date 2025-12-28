const apiKey = import.meta.env.VITE_GOOGLE_MAP_API_KEY;
const mapId = import.meta.env.VITE_GOOGLE_MAP_ID;

async function initMap() {
    const mapElement = document.getElementById("map");

    //必要なライブラリの読み込み
    const {Map, InfoWindow } = await google.maps.importLibrary("maps");
    const infoWindow = new InfoWindow();

    const map = new Map( mapElement, {
        center: { lat: 34.716216939136, lng: 137.65626712680375 },
        zoom: 10,
        mapId: mapId
    });
    map.addListener("click", (e) => {
        createClickableMarker(e.latLng, map, infoWindow);
        //座標にIDを付与してをDBに格納したい。
        const lat = e.latLng.lat()
        const lng = e.latLng.lng()
    });

}

async function createClickableMarker(latLng, map, infoWindow) {
    const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");
    const marker = new AdvancedMarkerElement({
        position: latLng,
        map,
        gmpClickable: true,
    });
    map.panTo(latLng);

    //Locationの引数をどこで定義するのかを確認。
    marker.addListener("click", (Location) => {
        // const Location = false;
        const AddSpot = '<div id="infoWindow_content">' + '<h2>スポットを追加しよう</h2>' + '<button>' + '<a href = "/googlemapsForm">addSpot</a>' + '</button>' + '</div>';
        const LocationData = {
            id: 1,
            user_id: 1,
            title: "あああ",
            description: "あああ",
            img_url: "http//example.com",
            lat: 12334,
            lng: 1234,
            created_at: "yyyy/mm/dd",
            updata_at: "yyyy/mm/dd",
        }
        const Post_location =`<h1>${LocationData.title}</h1>` + `<p>${LocationData.description}</p>`;
        //Locationの値が入っているならLocationDataを出力、ないならAddSpotを設定する。
        const location = Location ? AddSpot : Post_location;
        console.log(location)
        //新しいマーカーにはAddSpotを定義されているマーカーには,locationDataを表示
        infoWindow.close();
        infoWindow.setContent(AddSpot);
        infoWindow.open(map, marker);

    });
    return marker;
}

window.initMap = initMap;

// Google Maps スクリプトを読み込み
const script = document.createElement("script");
script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap&libraries=maps,marker`;
script.async = true;
document.head.appendChild(script);