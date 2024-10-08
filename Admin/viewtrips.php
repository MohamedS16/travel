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
        <title>View Trips</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        ?>
        <table>
            <tr>
                <th>Trip ID</th>
                <th>Trip Name</th>
                <th>Trip Price</th>
                <th>Trip Category</th>
                <th>Trip Description</th>
                <th>Trip Guide</th>
                <th>Trip Date</th>
                <th>Trip Images</th>
                <th>Trip Place</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php
            $selectQuery = "SELECT * FROM `trips`";
            $selectDone = mysqli_query($conn, $selectQuery);
            $data = mysqli_fetch_all($selectDone);
            foreach ($data as $trip) {
                $tripSwr = json_decode($trip[7])
            ?>
                <tr>
                    <td><?php echo $trip[0]; ?></td>
                    <td><?php echo $trip[1]; ?></td>
                    <td><?php echo $trip[2]; ?></td>
                    <td><?php echo $trip[3]; ?></td>
                    <td><?php echo $trip[4]; ?></td>
                    <td><?php echo $trip[5]; ?></td>
                    <td><?php echo $trip[6]; ?></td>
                    <td>
                        <?php
                        foreach ($tripSwr as $tripSora) { ?>
                            <img style="width: 150px; height:150px" src="<?php echo $tripSora ?>" alt="">
                        <?php }
                        ?>
                    </td>
                    <td><?php echo $trip[8] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" value="<?php echo $trip[0]; ?>" name="delId">
                            <input type="submit" value="Delete" name="deleteBtn">
                        </form>
                    </td>
                    <td>
                        <form action="updatetrip.php?trip=<?php echo $trip[0]; ?>" method="post">
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
            $deleteQuery = "DELETE FROM `trips` WHERE `tid` = '$delId'";
            $deleteDone = mysqli_query($conn, $deleteQuery);
            if ($deleteDone) {
        ?>
                <div class="success-message">
                    <div class="done">
                        <h1>Trip was Deleted Successfully</h1>
                        <a href="viewtrips.php">Confirm</a>
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