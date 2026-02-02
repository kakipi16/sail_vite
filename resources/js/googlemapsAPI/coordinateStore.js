export function saveCoordinate(lat, lng) {
    localStorage.setItem(
        "selectedCoordinate",
        JSON.stringify({ lat, lng })
    );
        console.log("localStorageに保存", lat, lng);

}
