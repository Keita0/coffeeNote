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

function calculateRatio(num1, num2) {
  if (num2 === 0) {
    return "Infinity";
  }

  const ratio = num1 / num2;
  return ratio.toFixed(2);
}

function calculateCoffeeWaterRatio() {
  const coffee = parseInt(document.getElementById("input-coffee").value);
  const water = parseInt(document.getElementById("input-water").value);

  const ratio = calculateRatio(coffee, water);

  const ratioTextbox = document.getElementById("input-ratio");
  ratioTextbox.value = ratio;
}

const inputCoffee = document.getElementById("input-coffee");
const inputWater = document.getElementById("input-water");

inputCoffee.addEventListener("input", calculateCoffeeWaterRatio);
inputWater.addEventListener("input", calculateCoffeeWaterRatio);
