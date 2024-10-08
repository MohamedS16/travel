<?php
require('conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/about.css">
    <title>About</title>
</head>

<body>
    <?php
    include('nav.php');
    ?>


    <section class="about-container">
        <div class="vision">
            <img src="./ancient-Images/pexels-yasmine-qasem-2034684.jpg" alt="">
            <div class="txt">
            <h1>Our Vision</h1>
                <p>
                    To be the leading travel company in Egypt, inspiring wanderlust and cultural exploration through authentic experiences that connect travelers with the rich history, breathtaking landscapes, and vibrant communities of this timeless land.
                </p>
            </div>
        </div>

        <div class="mission">
            <div class="txt">
                <h2>Our Mission</h2>
                <p>
                    Our mission is to create unforgettable journeys through Egypt by offering personalized travel experiences that highlight the country's unique heritage and natural beauty. We are dedicated to providing exceptional service, fostering sustainable tourism practices, and empowering local communities, ensuring that every traveler leaves with lasting memories and a deeper appreciation of Egypt's treasures.
                </p>
            </div>
            <img src="./ancient-Images/pexels-alex-azabache-3214970.jpg" alt="">
        </div>
    </section>


    <?php
    include('footer.php');
    ?>
</body>

</html>