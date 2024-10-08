<?php
require('conn.php');
$tripId = $_GET['trip'];
$selectQuery = "SELECT * FROM `trips` WHERE `tid` = '$tripId'";
$selectDone = mysqli_query($conn, $selectQuery);
$trip = mysqli_fetch_assoc($selectDone);
$tripImages = json_decode($trip['timgs']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/singletrip.css">
    <link rel="stylesheet" href="css/footer.css">
    <title><?php if(isset($trip)){echo $trip['name'];} ?></title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <section class="singleTripContainer">
        <h1><?php echo $trip['tname'] ?></h1>
        <div class="tripData">
            <img src="Admin/<?php echo $tripImages[0]; ?>" alt="" />
            <div class="singleTripDetails">
                <h1><?php echo $trip['tname']; ?></h1>
                <h3>Place: <?php echo $trip['tplace']; ?></h3>
                <p>
                    <?php echo $trip['tdesc']; ?>
                </p>
                <h3>EGP <?php echo $trip['tprice']; ?></h3>
                <span><b>Trip Guide:</b> <?php echo $trip['tguide']; ?></span>
                <span><b>Trip Category:</b><?php echo $trip['tcat']; ?></span>
                <span><b>Trip date:</b><?php echo $trip['tdate']; ?></span>
                <!-- <button>Book Now</button> -->
            </div>
        </div>
        <div class="singleTripGallery">
            <?php
            foreach ($tripImages as $image) { ?>
                <img src="Admin/<?php echo $image ?>" alt="">
            <?php }
            ?>
        </div>
    </section>
    <?php
    include('footer.php');
    ?>
</body>

</html>