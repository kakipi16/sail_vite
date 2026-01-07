const apiKey = import.meta.env.VITE_GOOGLE_MAP_API_KEY;
const mapId = import.meta.env.VITE_GOOGLE_MAP_ID;
const mapElement = document.getElementById("map");

async function initMap() {

    //必要なライブラリの読み込み
    const {Map, InfoWindow } = await google.maps.importLibrary("maps");
    const infoWindow = new InfoWindow();
    const { AdvancedMarkerElement } = ( await google.maps.importLibrary('marker'));
    const map = new Map( mapElement, {
        center: { lat: 34.716216939136, lng: 137.65626712680375 },
        zoom: 10,
        mapId: mapId
    });

    const marker = new AdvancedMarkerElement({
        position: {lat: 34.752331344555095, lng: 137.79565616978905}
    });
    let currentMarker = null;
    map.addListener("click", async (e) => {

        if (currentMarker) {
            currentMarker.map = null;
          }
        currentMarker =  await createClickableMarker(e.latLng, map, infoWindow);

        //座標にIDを付与してをDBに格納したい。
        const lat = e.latLng.lat()
        const lng = e.latLng.lng()
        const coordinate = { lat, lng };
        localStorage.setItem("selectedCoordinate", JSON.stringify(coordinate));

        console.log("localStorageに保存", coordinate);

    });
    mapElement.append(marker);

}

async function createClickableMarker(latLng, map, infoWindow) {
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    const marker = new AdvancedMarkerElement({
        position: latLng,
        map,
        gmpClickable: true,
    });

    map.panTo(latLng);

       // 仮：DBに登録済みデータがあるかどうか
       const LocationData = null;
       // ↑ あとで fetch でDBから取得する想定

    //Locationの引数をどこで定義するのかを確認。
    marker.addListener("click", () => {

        // const Location = false;
        const AddSpot = '<div id="infoWindow_content">' + '<h2>スポットを追加しよう</h2>' + '<button id="submitBtn">' + '<a href = "/googlemapsForm">addSpot</a>' + '</button>' + '</div>';
        // const LocationData = {
        //     id: 1,
        //     user_id: 1,
        //     title: "あああ",
        //     description: "あああ",
        //     img_url: "http//example.com",
        //     lat: 12334,
        //     lng: 1234,
        //     created_at: "yyyy/mm/dd",
        //     updata_at: "yyyy/mm/dd",
        // }
        //todo あとで作る。
        //Locationの値が入っているならLocationDataを出力、ないならAddSpotを設定する。
        // const Post_location =`<h1>${LocationData.title}</h1>` + `<p>${LocationData.description}</p>`;
        const content = Location ? AddSpot : Post_location;
        
        //新しいマーカーにはAddSpotを定義されているマーカーには,locationDataを表示
        infoWindow.close();

        //あとでcontentをしっかり設定する
        // infoWindow.setContent(content);
        infoWindow.setContent(AddSpot);
        infoWindow.open({ map, anchor: marker });

    });
    return marker;
}

window.initMap = initMap;

// Google Maps スクリプトを読み込み
const script = document.createElement("script");
script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap&libraries=maps,marker`;
script.async = true;
document.head.appendChild(script);
