<?php
session_start();
require_once "config.php";
$conn = mysqli_connect("localhost", "root", "", "milybookstore");
if (!$conn) {
    echo "Can't connect database " . mysqli_connect_error($conn);
    exit;
}
return $conn;

$query = "SELECT * FROM publisher ORDER BY publisher_name";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
}
if (mysqli_num_rows($result) == 0) {
    echo "Empty publisher ! Something wrong! check again";
    exit;
}

$title = "List Of Publishers";
require "./template/header.php";
?>
<p class="lead">List of Publisher</p>
<ul>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $count = 0;
        $query = "SELECT publisher_name FROM booksinfo";
        $result2 = mysqli_query($conn, $query);
        if (!$result2) {
            echo "Can't retrieve data " . mysqli_error($conn);
            exit;
        }
        while ($pubInBook = mysqli_fetch_assoc($result2)) {
            if ($pubInBook['publisherid'] == $row['publisherid']) {
                $count++;
            }
        }
        ?>
        <li>
            <span class="badge"><?php echo $count; ?></span>
            <a href="bookPerPub.php?pubid=<?php echo $row['publisherid']; ?>"><?php echo $row['publisher_name']; ?></a>
        </li>
    <?php } ?>
    <li>
        <a href="books.php">List full of books</a>
    </li>
</ul>
<?php
mysqli_close($conn);
require "config.php";
?>

