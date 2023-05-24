<?php
    $sql = "SELECT * FROM journal";
    $result = mysqli_query($conn, $sql);
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
    <!-- <h1>Hello, world!</h1> -->

    <div class="container pt-2">

        <div class="px-5">
            <div class="card mb-3 border border-primary border-3">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="https://avatars.githubusercontent.com/u/68840858?v=4" class="img-fluid rounded-start border-end border-primary border-3" alt="">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Coffee Name</h5>
                            <p class="card-text">Coffee Description</p>
                            <p class="card-text"><small class="text-muted">Any additional description</small></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>