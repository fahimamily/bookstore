<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$name = trim($_POST['username']);
	$pass = trim($_POST['password']);

	if(empty($name) || empty($pass)){
		header("Location:../onlinebookstore/signin.php?signin=empty");
	}else{ 
				$query = "SELECT name,pass from admin";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				 if($name == $row['name'] && $pass == $row['pass'] ){
					$_SESSION['admin'] = true;
					unset($_SESSION['expert']);
					unset($_SESSION['user']);
					unset($_SESSION['email']);
					header("Location: admin_book.php");
				}
				else{
					//check if it is expert
					$query = "SELECT name,pass from expert";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					if($name == $row['name'] && $pass == $row['pass'] ){
						$_SESSION['expert'] = true;
						unset($_SESSION['admin']);
						unset($_SESSION['user']);
						unset($_SESSION['email']);
						header("Location: admin_book.php");
					}
				else{
						//check if it is customer
						$name = mysqli_real_escape_string($conn, $name);
						$pass = mysqli_real_escape_string($conn, $pass);

						$query = "SELECT email,password from customers";
						$result = mysqli_query($conn, $query);
						for($i = 0; $i < mysqli_num_rows($result); $i++){
							$row = mysqli_fetch_assoc($result);
							if($name == $row['email'] && $pass == $row['password'] ){ 
								$_SESSION['user'] = true;	
								$_SESSION['email'] = $name;
								unset($_SESSION['admin']);
								unset($_SESSION['expert']);
								header("Location: index.php");
							}

						}
					}
				}
			}
	

	if(isset($conn)) {mysqli_close($conn);}
	
?>