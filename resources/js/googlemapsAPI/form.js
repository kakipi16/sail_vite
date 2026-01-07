document.addEventListener("DOMContentLoaded", () => {
  const SpotForm = document.querySelector("#SpotForm");
  if (!SpotForm) return;

  const saved = localStorage.getItem("selectedCoordinate")

  if (!saved) {
    alert("まだ地図をクリックしていません");
    return;
  }

  const coordinate = JSON.parse(saved);

  const InputLat = document.createElement("input");
  InputLat.type = "hidden";
  InputLat.name = "lat";
  InputLat.value = coordinate.lat;

  const InputLng = document.createElement("input");
  InputLng.type = "hidden";
  InputLng.name = "lng";
  InputLng.value = coordinate.lng;

  SpotForm.appendChild(InputLat);
  SpotForm.appendChild(InputLng);

  console.log("フォームにセットした", coordinate);

  SpotForm.addEventListener("submit", () => {
    localStorage.removeItem("selectedCoordinate");
  });
});