<?php
if (isset($_SESSION['admin'])) { ?>
    <header>
        <nav>
            <span>
                Welcome
                <?php
                echo $_SESSION['admin']['name'];
                ?>
            </span>
            <ul>
                <li>
                    <a href="Admin/dashboard.php">Home</a>
                </li>

                <li>
                    <a href="Admin/addtrip.php">Add Trip</a>
                </li>

                <li>
                    <a href="Admin/showtrips.php">Show Trips</a>
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
    }
    ?>
<?php   } else { ?>
    <header>
        <nav>
            <img src="images/Assets/logo2 (1).png" alt="">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="trips.php">Our Trips</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>

            </ul>
            <div class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
    <script>
        let links = document.querySelector('header nav ul')
        let menuIcon = document.querySelector('header nav .menu-icon')
        menuIcon.addEventListener('click', () => {
            links.classList.toggle('bigMenu')
        })
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 750) {
                links.style.display = 'flex'
            } else {
                links.style.display = 'none'
                links.classList.remove('bigMenu')
            }
        })
    </script>
<?php }
?>