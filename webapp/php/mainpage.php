<?php
include_once("../dbconnect.php");
$sqlroom = "SELECT * FROM tbl_rooms ORDER BY dateCreated DESC";
$stmt = $conn->prepare($sqlroom);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="../javascript/script.js"></script>
<title>Main Page</title>
</head>

<body>
     <div class="w3-header w3-container w3-pink w3-padding-32 w3-center">
     <h1 style="font-size:calc(8px + 4vw) ;">OneQuest ROOM RENTAL</h1>
       <p style="font-size:calc(8px + 1vw);;">Quality rentals to get you moving!</p>
     </div>

     <div class="w3-bar w3-pale-red">
      <a href="newroom.php" class="w3-bar-item w3-button w3- left">New Registration</a>
     </div>


<div class="w3-grid-template">
<?php
foreach($rows as $room){
    $contact = $room['contact'];
    $title = $room['title'];
    $description = $room['description'];
    $price = $room['price'];
    $deposit = $room['deposit'];
    $state = $room['state'];
    $area = $room['area'];
    $dateCreated = $room['dateCreated'];
    $latitude = $room['latitude'];
    $longitude = $room['longitude'];
    echo "<div class='w3-center w3-padding'>";
    echo "<div class='w3-card-4 w3-pale-red'>";
    echo "<header class='w3-container w3-pink'>";
    echo "<h5>$title</h5>";
    echo "</header>";
    echo "<img class='w3-image' src=../res/images/$title.png" . " onerror=this.onerror=null;this.src='../res/images/room.png'" . " style='width:100%;height:250px'>";
    echo "<div class='w3-container w3-left-align'><hr>";
    echo "
    <i class='fa fa-phone icon' style='font-size 20px;'>  Contact:</i> &nbsp&nbsp$contact<br>
    <i class='fa fa-info icon' style='font-size 20px;'>  Description:</i> &nbsp&nbsp$description<br>
    <i class='fa fa-dollar icon' style='font-size 20px;'>  Price:</i> &nbsp&nbsp$price<br>
    <i class='fa fa-dollar icon' style='font-size 20px;'>  Deposit:</i> &nbsp&nbsp$deposit<br>
    <i class='fa fa-map-pin icon' style='font-size 25px;'>  State:</i> &nbsp&nbsp$state<br>
    <i class='fa fa-map-pin icon' style='font-size 25px;'>  Area:</i> &nbsp&nbsp$area<br>
    <i class='fa fa-map-pin icon' style='font-size 25px;'>  Date Created:</i> &nbsp&nbsp$dateCreated<br>
    <i class='fa fa-location-arrow icon' style='font-size 25px;'>  Latitude:</i> &nbsp&nbsp$latitude<br>
    <i class='fa fa-location-arrow icon' style='font-size 25px;'>  Longitude:</i> &nbsp&nbsp$longitude<br></p><hr>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}
?>
</div>


     <footer class="w3-footer w3-center w3-pink">
       <p>OneQuest ROOM RENTAL</p>
</footer>

</body>

</html>