<?php
// connection to database
$conn = mysqli_connect("localhost", "root", "", "coffeenote");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>coffeeNote</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="journal.css">
  <script src="journal.js"></script>
</head>

<body>
  <form class="" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mx-auto my-3">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <input type="file" class="form-control-file" id="image-upload" onchange="updateImagePreview()" name="image" accept=".jpg, .jpeg, .png" value="">
            </div>
            <div class="form-group">
              <img id="image-preview" src="https://via.placeholder.com/400" class="img-thumbnail mx-auto d-block" alt="Placeholder Image" style="width: 20rem; height: 20rem;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container justify-content-center">
    <div class="row">
      <div class="col-md-6 mx-auto my-3">
        <div class="col-lg-4 text-left">
          <h5>Aroma</h5>
        </div>
        <input type="text" id="input-aroma" class="form-control" name="aroma">
      </div>
    </div>
  </div>
  <div class="container justify-content-center">
    <div class="row">
      <div class="col-md-6 mx-auto my-3">
        <div class="text-left">
          <h5>Flavor Profile</h5>
        </div>
        <input type="text" id="input-flavor-profile" class="form-control" name="flavor">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Roaster</h5>
        </div>
        <input type="text" id="input-roaster" class="form-control" name="roaster">
      </div>
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Roast Date</h5>
        </div>
        <input type="datetime-local" id="input-roast-date" class="form-control" name="roastdate">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Origin</h5>
        </div>
        <input type="text" id="input-origin" class="form-control" name="origin">
      </div>
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Region/Area</h5>
        </div>
        <input type="text" id="input-region" class="form-control" name="region">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Altitude</h5>
        </div>
        <input type="text" id="input-altitude" class="form-control" name="altitude">
      </div>
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Varietals</h5>
        </div>
        <input type="number" id="input-varietal" class="form-control" name="varietal">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Farm</h5>
        </div>
        <input type="text" id="input-farm" class="form-control" name="farm">
      </div>
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Lot #</h5>
        </div>
        <input type="text" id="input-lot" class="form-control" name="lot">
      </div>
    </div>
  </div>
  <div class="container justify-content-center">
    <div class="row align-items-start">
      <div class="col-md-6 mx-auto my-3">
        <div class="col-lg-4 text-left">
          <h5>Note</h5>
        </div>
        <textarea id="input-mote" class="form-control h-auto" name="note" rows="4"></textarea>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2 my-3">
        <div class="text-left">
          <h5>Coffee Amount</h5>
        </div>
        <input type="text" id="input-coffee" class="form-control" name="coffee">
      </div>
      <div class="col-md-2 my-3">
        <div class="text-left">
          <h5>Water Amount</h5>
        </div>
        <input type="text" id="input-water" class="form-control" name="water">
      </div>
      <div class="col-md-2 my-3">
        <div class="text-left">
          <h5>Ratio</h5>
        </div>
        <input type="text" id="input-ratio" class="form-control" name="cwratio" readonly>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Method</h5>
        </div>
        <input type="text" id="input-method" class="form-control" name="method">
      </div>
      <div class="col-md-3 my-3">
        <div class="text-left">
          <h5>Extraction Time</h5>
        </div>
        <input type="text" id="input-extraction-time" class="form-control" name="extractiontime">
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <div class="container justify-content-center">
    <div class="row">
      <div class="col-md-6 mx-auto my-3">
        <div class="col-lg-4 text-left">
          <h5>Rating</h5>
        </div>
        <div class="rating-list">
          <i class="fa fa-star fa-2x" data-index="0"></i>
          <i class="fa fa-star fa-2x" data-index="1"></i>
          <i class="fa fa-star fa-2x" data-index="2"></i>
          <i class="fa fa-star fa-2x" data-index="3"></i>
          <i class="fa fa-star fa-2x" data-index="4"></i>
        </div>
      </div>
    </div>
  </div>
  <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
  <script>
    var ratedIndex = -1;

    $(document).ready(function() {
      resetStarColors();

      $('.fa-star').on('click', function() {
        ratedIndex = parseInt($(this).data('index'));
        localStorage.setItem('ratedIndex', ratedIndex);
        saveToTheDB();
      });

      $('.fa-star').mouseover(function() {
        resetStarColors();
        var currentIndex = parseInt($(this).data('index'));
        setStars(currentIndex);
      });

      $('.fa-star').mouseleave(function() {
        resetStarColors();

        if (ratedIndex != -1)
          setStars(ratedIndex);
      });
    });


    function saveToTheDB() {
      $.ajax({
        url: "index.php",
        method: "POST",
        dataType: 'json',
        data: {
          save: 1,
          ratedIndex: ratedIndex
        }
      });
    }

    function setStars(max) {
      for (var i = 0; i <= max; i++)
        $('.fa-star:eq(' + i + ')').css('color', 'gold');
    }

    function resetStarColors() {
      $('.fa-star').css('color', 'grey');
    }
  </script>

  <div class="container justify-content-center">
    <div class="row">
      <div class="col-md-6 mx-auto my-3">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>

  </form>
  <?php
  if (isset($_POST['submit'])) {
    $image_url = $_POST['image'] ?? '';
    $aroma = $_POST['aroma'] ?? '';
    $varietal = $_POST['varietal'] ?? '';
    $flavor = $_POST['flavor'] ?? '';
    $altitude = $_POST['altitude'] ?? '';
    $roaster = $_POST['roaster'] ?? '';
    $roastdate = $_POST['roastdate'] ?? '';
    $origin = $_POST['origin'] ?? '';
    $region = $_POST['region'] ?? '';
    $altitude = $_POST['altitude'] ?? '';
    $farm = $_POST['farm'] ?? '';
    $lot = $_POST['lot'] ?? '';
    $note = $_POST['note'] ?? '';
    $coffee = $_POST['coffee'] ?? '';
    $water = $_POST['water'] ?? '';
    $cwratio = $_POST['cwratio'] ?? '';
    $method = $_POST['method'] ?? '';
    $extractiontime = $_POST['extractiontime'] ?? '';
    $rating = $_POST['rating'] ?? '';

    $sql = "INSERT INTO journal (image_url, varietal_id, aroma, flavor, altitude, roaster, roastdate, origin, region, farm, lot, note, coffee, water, ratio, method, extract_time, rating)
    VALUES ('$image_url', '$varietal ', '$aroma', '$flavor', '$altitude', '$roaster', '$roastdate', '$origin', '$region', '$farm', '$lot', '$note', '$coffee', '$water', '$cwratio', '$method', '$extractiontime', '$rating')";

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  mysqli_close($conn);

  ?>
</body>

</html>
