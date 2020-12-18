<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require_once "./functions/database_functions.php";

?>
<html lang="en">
    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/logo.png" style="width: 100px;"/>
        <title>Mily bookstore</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css1/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="css1/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css1/owl.carousel.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css1/responsive.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="header-area">
            <div style ="background-color: light" class="container">
                <div class="row">


                    <div class="col-md-4">
                        <div class="header-right">
                            <ul class="list-unstyled list-inline">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End header area -->

        <div class="site-branding-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <h1 style="color: mediumslateblue; font-family: cursive; font-size: 20px;"><a href="index.php"></i></a>Fahima's Book Store</h1>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="shopping-item" style=" background-image: element;">
                            <a href="cart.php">Shopping Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End site branding area -->

        <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> 
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="books.php">Books</a></li>
                            <li><a href="publisher_list.php">Publisher</a></li>
                            <li><a href="category_list.php">Categories</a></li>
                            <li><a href="cart.php">MyCart</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                            <li><a href="signin.php">Admin Login</a></li>
                            <li><a href="logout.php">Admin Logout</a></li>


                        </ul>
                    </div>  
                </div>
            </div>
        </div> <!-- End mainmenu area -->
        <div style ="background-color: pink" class="jumbotron">
            <center>
                <div style ="background-color: red" class="container">
                </div>
            </center>
        </div>