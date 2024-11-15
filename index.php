<?php
require('conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Home</title>
</head>

<body>
    <?php
    include('nav.php');
    ?>
    <section class="backgroundContainer">
        <div class="backgroundLayer">
            <div class="backgroundData">
                <h1>Greatness Egypt Tours</h1>
                <p>
                    Greatness Egypt Tours is a tour company in Giza , we are team of
                    qualified tour guides , tour operators and drivers , we organize
                    amazing holidays in Egypt .
                </p>
                <div class="buttons">
                    <a href="#about-section">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <section id="about-section" class="aboutSectionContainer">
        <div class="about">
            <div class="aboutContent">
                <h1>Welcome To Our Website</h1>
                <p>
                    We are a team consisting of tour guides, drivers, and tour organizers. We work together to provide the best tours for tourists coming to Egypt from all over the world, to spend a wonderful time of fun, entertainment, history, and discovering life in Egypt.

                    We invite you to discover Egypt with us and spend the best times. Discover the history of ancient Egypt and the pyramids, as well as the Christian and Islamic history of Egypt, the Greco-Roman period and campaign in thedesert.
                    We organize daily tours in Egypt, and you can also book a package to enjoy the discount on all tours
                </p>
                <a href="#ser">Learn More</a>
            </div>
            <div class="aboutImage">
                <img src="Images/Home/bg3.jpg" alt="" />
            </div>
        </div>
    </section>


    <section class="servicesm" id="ser">
            <h2 class="sec-title">Start Your Trip</h2>

            <div class="servicem-container">
                <div class="servicem">
                    <img src="Images/hieroglyph.png" alt="">
                    <p>Check our Trips Page</p>
                </div>
                <div class="servicem">
                    <img src="Images/choice.png" alt="">
                    <p>Choose Your Desired Trip</p>
                </div>
                <div class="servicem">
                    <img src="Images/contact-information.png" alt="">
                    <p>Contact Us To Reserve Your Trip</p>
                </div>
                <div class="servicem">
                    <img src="Images/magic-wand.png" alt="">
                    <p>And The Rest Is Magic</p>
                </div>
            </div>

        </section>


    <section class="servicesContainer">
        <h1>Our Services</h1>
        <div class="services">
            <div class="serviceBox">
                <h2>01</h2>
                <h3> Trips </h3>
                <p>
                    We Plan Your Trip Around Egypt, to be able to discover all the ancient places and historical places that you might not now about. giving you a full egyptian experience.
                </p>
            </div>
            <div class="serviceBox">
                <h2>02</h2>
                <h3>Local Egypt</h3>
                <p>
                    Discover the local places in egypt that only egyptians know, including restaurants, coffe shops and local shops. giving you a real egyptian citizen experience.
                </p>
            </div>
            <div class="serviceBox">
                <h2>03</h2>
                <h3>Door to Door</h3>
                <p>
                    all the transportations from and to the airport, around the trips and places are planned with us. all you have is to focus and enjoy the magical journey that comes once in a lifetime.
                </p>
            </div>
        </div>
    </section>

    <section class="gallery">
            <h2 class="sec-title"> Gallery </h2>
            <div class="images">
                <img src="./ancient-Images/pexels-alex-azabache-3214970.jpg" alt="Image" class="gsora">
                <img src="./ancient-Images/pexels-alex-azabache-3214972.jpg" alt="Image" class="gsora">
                <img src="./ancient-Images/pexels-antonio-filigno-10287305.jpg" alt="Image" class="gsora">
                <img src="./ancient-Images/pexels-antonio-filigno-10287306.jpg" alt="Image" class="gsora">
                <img src="./ancient-Images/pexels-yasmine-qasem-2034684.jpg" alt="Image" class="gsora">
                <img src="./ancient-Images/pexels-spencer-davis-4353815.jpg" alt="Image" class="gsora">
                <img src="./ancient-Images/pexels-roxanne-shewchuk-2184580.jpg" alt="Image" class="gsora">
                <img src="./ancient-Images/homebg.jpg" alt="Image" class="gsora">
            </div>
        </section>


    <?php
    include('footer.php');
    ?>
</body>

</html> 