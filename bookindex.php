<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-top: 0;
            }
            table tr td:last-child a{
                margin-right: 15px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">
                               All Books Informations </h2>
                            <br>
                            <br>
                            <br>


                            <a href="home.php" class="btn btn-info" role="button">Home</a>


                            <a href="addbook.php" class="btn btn-info" role="button">Add New Book Information</a>



                        </div>
                        <?php
                        // Include config file
                        require_once "config.php";
                        // Attempt select query executionS
                        $sql = "SELECT * FROM booksinfo";
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table table-bordered'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>ISBN</th>";
                                echo "<th>Title</th>";
                                echo "<th>Author</th>";
                                echo "<th>Image</th>";
                                echo "<th>Description</th>";
                                echo "<th>Price</th>";
                                echo "<th>Publisher</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['isbn'] . "</td>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['author'] . "</td>";
                                    echo "<td>" . $row['image'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['publisher_name'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='read.php?isbn=" . $row['isbn'] . "' title='View Record' data-toggle='tooltip'><span class='btn btn-info btn-xs'>View Record</span></a>";
                                    echo "<a href='update.php?isbn=" . $row['isbn'] . "' title='Update Record' data-toggle='tooltip'><span class='btn btn-warning btn-xs'>Update</span></a>";
                                    echo "<a href='delete.php?isbn=" . $row['isbn'] . "' title='Delete Record' data-toggle='tooltip'><span class='btn btn-danger btn-xs'>Delete</span></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>        
            </div>

        </div>
    </body>
</html>

