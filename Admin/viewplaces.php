<?php
ob_start();
require('../conn.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: ../login.php');
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/adminnav.css" />
        <link rel="stylesheet" href="css/admin.css" />
        <link rel="stylesheet" href="css/table.css">
        <title>View Places</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        ?>
        <table>
            <tr>
                <th>Place ID</th>
                <th>Place Name</th>
                <th>Place Description</th>
                <th>Place Thumbnail</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php
            $selectQuery = "SELECT * FROM `places`";
            $selectDone = mysqli_query($conn, $selectQuery);
            $data = mysqli_fetch_all($selectDone);
            foreach ($data as $place) {
            ?>
                <tr>
                    <td><?php echo $place[0]; ?></td>
                    <td><?php echo $place[1]; ?></td>
                    <td><?php echo $place[2]; ?></td>
                    <td><img src="<?php echo $place[3]; ?>" alt=""></td>
                    <td>
                        <form method="post">
                            <input type="hidden" value="<?php echo $place[0]; ?>" name="delId">
                            <input type="submit" value="Delete" name="deleteBtn">
                        </form>
                    </td>
                    <td>
                        <form action="updateplace.php?place=<?php echo $place[0]; ?>" method="post">
                            <input type="submit" value="Update" name="updateBtn">
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
        <?php
        if (isset($_POST['deleteBtn'])) {
            $delId = $_POST['delId'];
            $deleteQuery = "DELETE FROM `places` WHERE `pid` = '$delId'";
            $deleteDone = mysqli_query($conn, $deleteQuery);
            if ($deleteDone) {
        ?>
                <div class="success-message">
                    <div class="done">
                        <h1>Place was Deleted Successfully</h1>
                        <a href="viewplaces.php">Confirm</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </body>

    </html>

<?php }

ob_end_flush();
?>