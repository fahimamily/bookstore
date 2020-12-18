<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; text-align: center; }
        </style>
    </head>
    <body>
        <div class="page-header">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Admin Section.</h1>
        </div>
        <p>
            <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        </p>

        <?php
        if ($_SESSION["user_role"] == "admin") {
            ?>


        <table class="table table-bordered table-striped" style="width: 50%; margin: auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Created</th>
                        <th>User Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from users";
                    $result = mysqli_query($link, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>"
                            . "<td>" . $row["id"] . "</td>"
                            . "<td>" . $row["username"] . "</td>"
                            . "<td>" . $row["created_at"] . "</td><td>" . $row["user_role"] . "</td>"
                            . "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($link);
                    ?>
                </tbody>
            </table>

            <?php
        } else {
            ?>    
            <p>Sorry, you are not authorized to view this page.</p>
            <?php
        }
        ?>


    </body>
</html>