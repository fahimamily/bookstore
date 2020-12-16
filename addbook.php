



<?php
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$isbn = $title = $author = $image = $description = $price = $publisher_name = "";
$isbn_err = $title_err = $author_err = $image_err = $description_err = $price_err = $publisher_name_err = "";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_isbn = trim($_POST["isbn"]);
    if (empty($input_isbn)) {
        $isbn_err = "Please enter isbn.";
    } else {
        $isbn = $input_isbn;
    }

    // Validate title
    $input_title = trim($_POST["title"]);
    if (empty($input_title)) {
        $title_err = "Please enter title.";
    } else {
        $title = $input_title;
    }

    // Validate email
    $input_author = trim($_POST["author"]);
    if (empty($input_author)) {
        $author_err = "Please enter an author .";
    } else {
        $author = $input_author;
    }
    // Validate room
    $input_image = trim($_POST["image"]);
    if (empty($input_image)) {
        $image_err = "Please enter image ";
    } else {
        $image = $input_image;
    }

    $input_description = trim($_POST["description"]);
    if (empty($input_description)) {
        $description_err = "Please enter description ";
    } else {
        $description = $input_description;
    }

    // Validate price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the pricer .";
    } elseif (!ctype_digit($input_price)) {
        $price_err = "Please enter a positive integer value.";
    } else {
        $price = $input_price;
    }
    $input_publisher_name = trim($_POST["publisher_name"]);
    if (empty($input_publisher_name)) {
        $publisher_name_err = "Please enter publisher_name ";
    } else {
        $publisher_name = $input_publisher_name;
    }




    // Check input errors before inserting in database
    if (empty($isbn_err) && empty($title_err) &&
            empty($author_err) && empty($image_err) && empty($description) && empty($price_err) && empty($publisher_name_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO milybookstore.booksinfo (isbn, title, author, image, description, price, publisher_name) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssis", $param_isbn, $param_title, $param_author, $param_image, $param_description, $param_price, $param_publisher_name);
            // Set parameters );
            // Set parameters);
            // Set parameters
            $param_isbn = $isbn;
            $param_title = $title;
            $param_author = $author;
            $param_image = $image;
            $param_description = $description;
            $param_price = $price;
            $param_publisher_name = $publisher_name;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
// Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

// Close statement
        mysqli_stmt_close($stmt);
    }
// Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create Record</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper{
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Create Record</h2>
                        </div>
                        <p>Please fill this form and submit to add student 
                            record to the database.</p>
                        <form 
                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
                            method="post">
                            <div class="form-group 
                                 <?php echo (!empty($isbn_err)) ? 'has-error' : ''; ?>">
                                <label>ISBN</label>
                                <input type="text" name="isbn" class="form-control" 
                                       value="<?php echo $isbn; ?>">
                                <span class="help-block"><?php echo $isbn_err; ?></span>
                            </div>
                            <div class="form-group 
                                 <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                       <?php echo $title; ?></textarea> 
                                <span class="help-block"><?php echo $title_err; ?></span>
                            </div>
                            
                            
                             <div class="form-group 
                                 <?php echo (!empty($author_err)) ? 'has-error' : ''; ?>">
                                <label>Author</label>
                                <input type="text" name="author" class="form-control" 
                                       value="<?php echo $author; ?>">
                                <span class="help-block"><?php echo $author_err; ?></span>
                            </div>
                            

                            <div class="form-group 
                                 <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                                <label>description</label>
                                <textarea name="description" class="form-control">
                                       <?php echo $description; ?></textarea>
                                <span class="help-block"><?php echo $description_err; ?></span>
                            </div>

                            <div class="form-group 
                                 <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                                <label>Image</label>
                                <input type="text" name="image" class="form-control" 
                                       value="<?php echo $image; ?>">
                                <span class="help-block"><?php echo $image_err; ?></span>
                            </div>

                            <div class="form-group 
                                 <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                                <label>price</label>
                                <input type="text" name="price" class="form-control" 
                                       value="<?php echo $price; ?>">
                                <span class="help-block"><?php echo $price_err; ?></span>
                            </div>
                            
                            
                            
                            
                            
                <!--            <div class="form-group 
                                 <?php echo (!empty($studentid_err)) ? 'has-error' : ''; ?>">
                                <label>Student Id</label>
                                <textarea name="studentid" class="form-control">
                                    <?php echo $studentid; ?></textarea>
                                <span class="help-block"><?php echo $studentid_err; ?></span>
                            </div>
                -->
                           <div class="form-group 
                                 <?php echo (!empty($publisher_name_err)) ? 'has-error' : ''; ?>">
                                <label>publisher_name</label>
                                <input type="text" name="publisher_name" class="form-control" 
                                       value="<?php echo $publisher_name; ?>">
                                <span class="help-block"><?php echo $publisher_name_err; ?></span>
                            </div>



                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="bookindex.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>



