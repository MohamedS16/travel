<?php
require('conn.php');
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="Admin/css/login.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>

<body>
    <?php
    include('nav.php');
    if (isset($_POST['login'])) {
        $email = htmlspecialchars($_POST['email']);
        $pw = htmlspecialchars($_POST['pw']);
        $err = [];
        if ($email == '' && $pw == '') {
            $err['loginerror'] = "Fields are required";
        } else {
            if ($email === "rania@gmail.com") {
                if ($pw === "123") {
                    session_start();
                    $_SESSION['admin'] = ['email' => $email, 'name' => "Rania"];
                    header('location: Admin/dashboard.php');
                } else {
                    $err['wrongpw'] = "Wrong Password";
                }
            } else {
                $err['emailerr'] = "Wrong Email";
            }
        }
    }
    ?>

    <section class="signContainer">
        <img src='Images/Home/bg2.jpg' alt="" />
        <div class="formContainer">
            <form method="post">
                <h1>Sign in</h1>
                <?php
                if (isset($err['loginerr'])) { ?>
                    <span><?php echo $err['loginerr']; ?></span>
                <?php }
                ?>
                <input type="email" placeholder="Email" name="email" value="<?php if (isset($email)) {
                                                                                echo $email;
                                                                            } ?>" />
                <?php
                if (isset($err['emailerr'])) { ?>
                    <span><?php echo $err['emailerr']; ?></span>
                <?php }
                ?>
                <input type="password" placeholder="Password" name="pw" value="<?php if (isset($pw)) {
                                                                                    echo $pw;
                                                                                } ?>" />
                <?php
                if (isset($err['wrongpw'])) { ?>
                    <span><?php echo $err['wrongpw']; ?></span>
                <?php }
                ?>
                <input type="submit" value="Sign In" name="login" />
            </form>
        </div>
    </section>
    <?php
    include('footer.php');
    ?>
</body>

</html>
<?php
ob_end_flush();
?>