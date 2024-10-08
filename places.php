<?php
require('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/places.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <title>Document</title>
</head>

<body>
    <?php
    include('nav.php');
    $selectQuery = "SELECT * FROM `places`";
    $selectDone = mysqli_query($conn, $selectQuery);
    $places = mysqli_fetch_all($selectDone);
    ?>
    <section class="placesContainer">
        <h1>Places</h1>
        <div class="places">
            <?php
            foreach ($places as $place) {
            ?>
                <div class="place">
                    <img alt="" src="Admin/<?php echo $place[3]; ?>" />
                    <div class="placeData">
                        <h3><?php echo $place[1]; ?></h3>
                        <a href="singleplace.php?place=<?php echo $place[1]; ?>">Show More</a>
                    </div>
                </div>

            <?php }
            ?>
        </div>
    </section>
    <?php include('footer.php'); ?>
</body>

</html>