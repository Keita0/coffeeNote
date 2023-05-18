<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Establish a database connection
    $conn = mysqli_connect('localhost', 'root', '', 'journal');

    // Get form input values
    $image = $_FILES['image']['name'];
    $aroma = $_POST['aroma'];
    $flavor = $_POST['flavor'];
    $roaster = $_POST['roaster'];
    $roastdate = $_POST['roastdate'];
    $producer = $_POST['producer'];
    $price = $_POST['price'];
    $origin = $_POST['origin'];
    $region = $_POST['region'];
    $altitude = $_POST['altitude'];
    $varietal = $_POST['varietal'];
    $farm = $_POST['farm'];
    $lot = $_POST['lot'];
    $note = $_POST['note'];
    $coffee = $_POST['coffee'];
    $water = $_POST['water'];
    $cwratio = $_POST['cwratio'];
    $method = $_POST['method'];
    $extractiontime = $_POST['extractiontime'];

    // Handle image upload
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

    // Check if record already exists (for update)
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "UPDATE items SET image='$image', aroma='$aroma', flavor='$flavor', roaster='$aroma',
        roastdate='$roastdate', producer='$producer', price='$price', origin='$origin', region='$region',
        altitude='$altitude', varietal='$varietal', farm='$farm', lot='$lot', note='$note', coffee='$coffee',
        water='$water', cwratio='$cwratio', method='$method', extractiontime='$extractiontime' WHERE id=$id";
    } else {
        // Insert new record
        $query = "INSERT INTO coffeejournal (image, aroma, flavor, roaster, roastdate, producer, price, 
        origin, region, altitude, farm, lot, note, coffee, water, cwratio, method, extractiontime) 
        VALUES ('$image', '$aroma', '$flavor', '$roaster', '$roastdate', '$producer', '$price', '$origin', 
        '$region', '$altitude', '$farm', '$lot', '$note', '$coffee', '$water', '$cwratio', '$method', '$extractiontime')";
    }

    // Execute the query
    mysqli_query($conn, $query);

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the form or a success page
    header('Location: index.php');
    exit();
}
?>
