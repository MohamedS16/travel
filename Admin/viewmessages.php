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
        <title>View Messages</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        ?>
        <table>
            <tr>
                <th>Message ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Message</th>
                <th>Delete</th>
                <th>Read</th>
            </tr>
            <?php
            $selectQuery = "SELECT * FROM `contact`";
            $selectDone = mysqli_query($conn, $selectQuery);
            $data = mysqli_fetch_all($selectDone);
            foreach ($data as $message) {
            ?>
                <tr style="<?php switch ($message[5]) {
                                case '1':
                                    echo "background-color: rgba(255, 0, 0, 0.359)";
                                    break;
                                case '2':
                                    echo "background-color: rgba(0, 128, 0, 0.359)";
                                    break;
                            } ?>">
                    <td><?php echo $message[0]; ?></td>
                    <td><?php echo $message[1]; ?></td>
                    <td><?php echo $message[2]; ?></td>
                    <td><?php echo $message[4] ?></td>
                    <td><?php echo $message[3] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" value="<?php echo $message[0]; ?>" name="msgId">
                            <input type="submit" value="Delete" name="deleteBtn">
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" value="<?php echo $message[0]; ?>" name="readMessageId">
                            <input style="color: #2b2b2b;" type="submit" value="Read" name="readId">
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
        <?php
        if (isset($_POST['deleteBtn'])) {
            $msgId = $_POST['msgId'];
            $deleteQuery = "DELETE FROM `contact` WHERE `mid` = '$msgId'";
            $deleteDone = mysqli_query($conn, $deleteQuery);
            if ($deleteDone) {
        ?>
                <div class="success-message">
                    <div class="done">
                        <h1>Deleted Successfully</h1>
                        <a href="viewmessages.php">Confirm</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['readId'])) {
            $readMessageId = $_POST['readMessageId'];
            $updateQuery = "UPDATE `contact` SET `read` = '2' WHERE `mid` = '$readMessageId'";
            $updateDone = mysqli_query($conn, $updateQuery);
            if ($updateDone) { ?>
                <div class="success-message">
                    <div class="done">
                        <h1>Read Successfully</h1>
                        <a href="viewmessages.php">Confirm</a>
                    </div>
                </div>
        <?php }
        }
        ?>
    </body>

    </html>

<?php }

ob_end_flush();
?>