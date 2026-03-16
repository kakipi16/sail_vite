const fileSelect = document.getElementById("imageButton");
const fileElem = document.getElementById("imageUpload");

fileSelect.addEventListener("click", () => {
  console.log("hello")
  if (fileElem) {
    fileElem.click();
  }
}, false);