<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '1234567', 'CRUD_A');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$b_price = $_POST['b_price'];
		$s_price = $_POST['s_price'];

		mysqli_query($db, "INSERT INTO info (`name`, `b_price`, `s_price`) VALUES ('$name', '$b_price', '$b_price')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $b_price = $_POST['b_price'];
        $s_price = $_POST['s_price'];
    
        mysqli_query($db, "UPDATE info SET name='$name', b_price='$b_price', s_price='$s_price' WHERE id=$id");
        $_SESSION['message'] = "Address updated!"; 
        header('location: INDEX.php');
    }
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: INDEX.php');
    }
?>