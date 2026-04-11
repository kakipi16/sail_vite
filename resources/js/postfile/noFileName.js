const fileSelect = document.getElementById("imageButton");
const fileElem = document.getElementById("imageUpload");

fileSelect.addEventListener("click", () => {
  if (fileElem) {
    fileElem.click();
  }
}, false);