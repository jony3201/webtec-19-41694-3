<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Login Form</title>
	<style>
        body{
          background: #F2E1F9  ;
          margin: auto;
          width: 30%;
          border: 2px solid #48575B ;
          padding: 35px;
          font-family: poppins;

        }
        .make-it-center{
          margin: auto;
          width: 85%;
        }
        .error{
        	color: red;
        }
        .required:after {
          content:"*";
          color: red;
        }
    </style>
</head>
<body>

<?php

$userErr = $passErr = "";
$username = $password = ""; 
$errCount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["username"])) {
	    $userErr = "Username is required";
	    $errCount = $errCount + 1;	
	  } else {
	    $username = check_input($_POST["username"]);

	    if (strlen($username) <2 ) {
	    	// code...
	    	$userErr = "Minimum 2 characters required";
	    	$errCount = $errCount + 1;	
	    }

	   
	    if (!preg_match("/^[a-zA-Z_\-.]*$/", $username)) {
	    	$userErr = "Username can contain alpha numeric characters, period, dash or underscore only!";
	    	$username ="";
	    	$errCount = $errCount + 1;	
	    }

	  }

  if (empty($_POST["password"])) {
    $passErr = "Password is required";
    $errCount = $errCount + 1;	
  } else {
    $password = check_input($_POST["password"]);
  }

  	if (strlen($password) <8 ) {
	    	
	    	$passErr = "Minimum 8 characters required";
	    	$errCount = $errCount + 1;	
	    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[%$#@]).+$/", $password)) {
    
	    	$passErr .= " Password must contain atleast a digit, a lower case and an upper case letter, atleast one of the [%$#@] and no space.";
	    	$password ="";
	    	$errCount = $errCount + 1;	
	    }

    if ($errCount < 1){

        $strJsonFileContents = file_get_contents("data.json");
        

        $arra = json_decode($strJsonFileContents);
       
        $user_found = false;
        foreach($arra as $item) { 

            if ($username === $item->username){
                $user_found = true;
              
                if ($password === $item->password){
                    echo "WELLCOME . $item->name ... success!!";
                    header('Refresh: 3; Location: dashboard.php');
                    exit;
                }else{
                    $passErr .= "Incorrect Password!";
                }
            }
        }
        if (!$user_found){
            echo $userErr .= "No account found!";
        }


        //exit;

    }

}

  function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<div class="donor-info make-it-center">
<h2>Login</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $userErr;?></span>
  <br><br>

  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  <input type="checkbox" id="rmbm" name="rmbm" value="True">
  <label for="rmbm"> Remember Me</label><br><br>

<input type="submit" name="submit" value="Submit">  
<span>Forgot Password?</span>

</form>
</div>
</body>
</html>