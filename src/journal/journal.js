function updateImagePreview() {
  var preview = document.getElementById("image-preview");
  var file = document.getElementById("image-upload").files[0];
  var reader = new FileReader();

  reader.onloadend = function() {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "https://via.placeholder.com/400";
  }
}