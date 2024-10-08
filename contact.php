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
    <title>Contact</title>
</head>

<body>
    <?php
    include('nav.php');
    ?>

    <section id="contact-section" class="contact-section">
        <div class="contact">
            <img src="Images/Home/bg7.jpg" alt="">
            <div class="contact-form">
                <h1>Contact Us</h1>
                <form method="post">
                    <input type="text" placeholder="Full Name" name="fullname">
                    <input type="text" placeholder="Email" name="email">
                    <textarea placeholder="Enter Your Message" name="message"></textarea>
                    <input type="submit" value="Send" name="send">
                </form>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST['send'])) {
        $fullName = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $insertQuery = "INSERT INTO `contact` (`fullname` , `email` , `message` , `read`) VALUES ('$fullName' , '$email' , '$message' , '1')";
        $insertDone = mysqli_query($conn, $insertQuery);
        if ($insertDone) { ?>
            <div class="success-message">
                <div class="done">
                    <h1>Message was sent Successfully</h1>
                    <a href="index.php">Confirm</a>
                </div>
            </div>
    <?php }
    }
    ?>
    <?php
    include('footer.php');
    ?>
</body>

</html>