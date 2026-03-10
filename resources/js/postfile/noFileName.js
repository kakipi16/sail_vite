const fileSelect = document.getElementById("imageButton");
const fileElem = document.getElementById("imageUpload");

fileSelect.addEventListener("click", (e) => {
  console.log("hello")
  if (fileElem) {
    fileElem.click();
  }
}, false);