<?php
// connection to database
include_once "../connection.php";

$sql = "SELECT * FROM varietal";
$varietal = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {
  // $image_url = $_POST['image'] ?? '';
  $aroma = $_POST['aroma'] ?? '';
  $name = $_POST['name'] ?? '';
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

  // $image = $_POST['image'];
  //Stores the filename as it was on the client computer.
  $imagename = $_FILES['image']['name'];
  //Stores the filetype e.g image/jpeg
  $imagetype = $_FILES['image']['type'];
  //Stores any error codes from the upload.
  $imageerror = $_FILES['image']['error'];
  //Stores the tempname as it is given by the host when uploaded.
  $imagetemp = $_FILES['image']['tmp_name'];

  //The path you wish to upload the image to
  $imagePath = "../images/";
  $image_url = '';
  if(is_uploaded_file($imagetemp)) {
    $image_url = $imagePath.$imagename;
      if(move_uploaded_file($imagetemp, $image_url)) {
          // echo "Sussecfully uploaded your image.";
      }
      else {
          echo "Failed to move your image.";
      }
  }
  else {
      echo "Failed to upload your image.";
  }

  $sql = "INSERT INTO journal (image_url, varietal_id, name, aroma, flavor, altitude, roaster, roastdate, origin, region, farm, lot, note, coffee, water, ratio, method, extract_time, rating)
  VALUES ('$image_url', '$varietal ', '$name', '$aroma', '$flavor', '$altitude', '$roaster', '$roastdate', '$origin', '$region', '$farm', '$lot', '$note', '$coffee', '$water', '$cwratio', '$method', '$extractiontime', '$rating')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: index.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>coffeeNote</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="journal.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
          <h5>Name</h5>
        </div>
        <input type="text" id="input-name" class="form-control" name="name">
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
          <select id="input-varietal" class="form-control" name="varietal" placeholder="Varietal">
            <!-- <option value="" disabled selected>Select varietal</option> -->
            <?php
                if (mysqli_num_rows($varietal) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($varietal)) {

                      echo "<option value='".$row['varietal_id']."'>".$row['varietal_name']."</option>";
                    }
                  }
            ?>
          </select>
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
  <div class="container justify-content-center">
    <div class="row">
      <div class="col-md-6 mx-auto my-3">
        <div class="col-lg-4 text-left">
          <h5>Rating</h5>
        </div>
        <div class="rating-list">
          <input type="hidden" name="rating" id="rating">
          <i class="fa fa-star fa-2x" data-index="0"></i>
          <i class="fa fa-star fa-2x" data-index="1"></i>
          <i class="fa fa-star fa-2x" data-index="2"></i>
          <i class="fa fa-star fa-2x" data-index="3"></i>
          <i class="fa fa-star fa-2x" data-index="4"></i>
        </div>
      </div>
    </div>
  </div>


  <div class="container justify-content-center">
    <div class="row">
      <div class="col-md-6 mx-auto my-3">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>

  </form>

</body>
  <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
  <script>
    var ratedIndex = -1;

    $(document).ready(function() {
      resetStarColors();

      $('.fa-star').on('click', function() {
        ratedIndex = parseInt($(this).data('index'));
        localStorage.setItem('ratedIndex', ratedIndex);
        $('#rating').val(ratedIndex);
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


    function setStars(max) {
      for (var i = 0; i <= max; i++)
        $('.fa-star:eq(' + i + ')').css('color', 'gold');
    }

    function resetStarColors() {
      $('.fa-star').css('color', 'grey');
    }
  </script>
</html>
