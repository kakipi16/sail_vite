const imageUpload = document.getElementById("imageUpload");
imageUpload.addEventListener('change', (e) => {
  const file = e.target.files[0];
  if (!file) return

  const reader = new FileReader()

  reader.onload = (event) => {
    document.querySelector('#img').src = event.target.result
  }

  reader.readAsDataURL(file)
})