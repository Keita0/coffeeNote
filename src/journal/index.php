<?php
    include_once('../connection.php');
    $sql = "SELECT * FROM journal";
    $result = mysqli_query($conn, $sql);
    var_dump($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Coffee Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="container pt-2">

        <div class="px-5">


            <?php
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {

            ?>
                <div class="card mb-3 border border-primary border-3">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="../image/default.avif" class="img-fluid rounded-start border-end border-primary border-3" alt="">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['farm'];  ?></h5>
                                <p class="card-text"><?= $row['varietal_id']; ?></p>
                                <p class="card-text"><small class="text-muted">Rating: <?= $row['rating']; ?></small></p>
                            </div>
                        
                        </div>
                    </div>
                </div>

            <?php
                    }
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>