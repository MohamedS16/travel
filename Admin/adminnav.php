<header>
    <nav>
        <span>
            Welcome
            <?php
            ini_set('session.cookie_secure', 1);  // Ensure cookies are sent over HTTPS
            header("Content-Security-Policy: default-src 'self'; script-src 'self' https://apis.google.com;");
            // Set security headers
            header("X-Content-Type-Options: nosniff");
            header("X-Frame-Options: DENY");
            header("Strict-Transport-Security: max-age=31536000; includeSubDomains");


            ini_set('session.cookie_httponly', 1);  // Prevent JavaScript access to session cookie
            echo $_SESSION['admin']['name'];
            ?>
        </span>
        <ul>
            <li>
                <a href="../index.php">Home</a>
            </li>
            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="addtrip.php">Add Trip</a>
            </li>

            <li>
                <a href="viewtrips.php">Show Trips</a>
            </li>
        </ul>
        <?php
        if (isset($_SESSION['admin'])) { ?>
            <form method="post">
                <input type="submit" value="Logout" name="logout">
            </form>
        <?php }
        ?>
        <div class="menu-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>
<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /login.php');
}
?>
<script>
    let links = document.querySelector('header nav ul')
    let icon = document.querySelector('header nav .menu-icon')
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 932) {
            links.style.display = 'flex'
            icon.style.display = 'none'
            links.classList.remove('bigMenu')
        } else {
            links.style.display = 'none'
            icon.style.display = 'flex'
        }
    })
    icon.addEventListener('click', () => {
        links.classList.toggle('bigMenu')
    })
</script>