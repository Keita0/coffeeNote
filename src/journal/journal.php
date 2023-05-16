<?php
  $image = $_POST['image'];
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
  $water = $_POST['water'];
  $coffee = $_POST['coffee'];
  $cwratio = $_POST['cwratio'];
  $method = $_POST['method'];
  $extractiontime = $_POST['extractiontime'];

  //database connection
  $conn = new mysqli('localhost','root','','journal');
  if($conn->connect_error){
    die('Connection Failed : ',$conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into registration(image,aroma,flavor,roaster
    roastdate,producer,price,origin,region,altitude,varietal,farm,lot,note,water,
    coffeemcwratio,method,extractiontime) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
    ?,?,?)");
    $stmt->bind_param("bsssssdssissisdddsi",$image,$aroma,$flavor,$roaster,$roastdate
    $producer,$price,$origin,$region,$altitude,$varietal,$farm,$lot,$note,$water,$coffee
    $cwratio,$method,$extractiontime);
    $stmt->execute();
    echo "successfully added"
    $stmt->close();
    $conn->close();
  }
?>