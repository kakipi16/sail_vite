document.addEventListener("DOMContentLoaded", () => {
  const SpotForm = document.querySelector("#SpotForm");
  if (!SpotForm) return;

  const latInput = document.getElementById("lat");
  const lngInput = document.getElementById("lng");
  const saved = localStorage.getItem("selectedCoordinate")

  const coordinate = JSON.parse(saved);

  latInput.value = coordinate.lat;
  lngInput.value = coordinate.lng;

  console.log("lat:", latInput.value);
  console.log("lng:", lngInput.value);

  console.log("フォームにセットした", coordinate);

  SpotForm.addEventListener("submit", () => {
    if (!saved) {
      alert("まだ地図をクリックしていません");
      return;
    }
    localStorage.removeItem("selectedCoordinate");
  });
});