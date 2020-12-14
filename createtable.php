<?php

$link = mysqli_connect("localhost", "root", "", "demo");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "CREATE TABLE users(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
     
   
)";



if (mysqli_query($link, $sql)) {
    echo "Table users created successfully.";
} else {
    echo "ERROR: Could not execute $sql. "
    . mysqli_error($link);
}
// Close connection
mysqli_close($link);


$link = mysqli_connect("localhost", "root", "", "demo");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "CREATE TABLE booksinfo(
    isbn VARCHAR(30) NOT NULL PRIMARY KEY,
    title VARCHAR(90) NOT NULL,
    author VARCHAR(30) NOT NULL,
    image VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,    
    price  DECIMAL(6,2) NOT NULL,    
    publisher_name VARCHAR(30) NOT NULL
     
)";


if (mysqli_query($link, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not execute $sql. "
    . mysqli_error($link);
}
// Close connection
mysqli_close($link);

$link = mysqli_connect("localhost", "root", "", "demo");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "CREATE TABLE publisher(
    publisher_id INT(10) NOT NULL PRIMARY KEY,    
    publisher_name VARCHAR(30) NOT NULL
     
)";


if (mysqli_query($link, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not execute $sql. "
    . mysqli_error($link);
}
// Close connection
mysqli_close($link);


?>

