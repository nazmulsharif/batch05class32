<?php
	session_start();
	if(empty($_SESSION['email'])||empty($_SESSION['pass'])){
		header('location:index.php');
	}
	else{
		echo "Welcome, ";
		echo $_SESSION['fname']." ".$_SESSION['lname'];

	}


?>
<a href="inc/logout.php" style="float:right;">Log out</a>
<img src="images/<?php echo $_SESSION['image']?>" alt="">