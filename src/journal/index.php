<?php
    if (!isset($_SESSION["user"])) {
        header("Location: ../home/index.php");
        die();
    }

    include_once('../connection.php');
    $sql = "SELECT * FROM journal LEFT JOIN varietal ON journal.varietal_id = varietal.varietal_id WHERE user_id = ".$_SESSION['userId'];
    $result = mysqli_query($conn, $sql);
    // var_dump($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Coffee Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body>

    <div class="container pt-2 ">
        <div class="px-5">
            <div class="row py-3">
                <div class="col-md-4">
                    <a href="insert.php" class="btn btn-primary">Create New Note</a>
                </div>
            </div>


            <?php
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {

            ?>
                <a href="edit.php?id=<?= $row['id'];  ?>" class="text-decoration-none" style="color: inherit;">
                    <div class="card mb-3 border border-primary border-3">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="<?= $row['image_url'] != '' ? $row['image_url'] : '../images/default.avif' ?>" class="img-fluid rounded-start border-end border-primary border-3" 
                                alt="" style='height: 250px;width: 250px; object-fit: cover'>
                            </div>


                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" ><?= $row['name'];  ?></h5>
                                        <p class="card-text">Flavor: <?= $row['flavor']; ?></p>
                                        <p class="card-text">Aroma: <?= $row['aroma']; ?></p>
                                        <p class="card-text">Varietal: <?= $row['varietal_name']; ?></p>
                                        <p class="card-text">
                                            <div class="rating-list">
                                            <?php
                                                for ($i=0; $i < 5; $i++) { 
                                                    if ($i <= $row['rating']){
                                                        echo '<div class="fa fa-star fa-2x" style="color:gold"></div>';
                                                    } else {
                                                        echo '<div class="fa fa-star fa-2x" style="color:gray"></div>';
        
                                                    }
                                                }
        
                                            ?>
                                            </div>
                                        </p>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </a>
                        
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>