<html>
<head>
	<meta charset="utf-8">
	<title> </title>
	<style>
        body{
          background: #F2E1F9  ;
          margin: auto;
          width: 30%;
          border: 2px solid #48575B ;
          padding: 35px;
          font-family: poppins;}
    </style>
</head>
 </body>
<nav>
<?php
if (isset($_SESSION['uname'])) {
    echo '<span>Logged in as '.$_SESSION['uname'] .'</span> | ';
    echo '<span>Logout</span>';
    } else {
    echo '
  <a href="/webtech/Lab4/">Home</a> |
  <a href="/webtech/Lab4/login.php">Login</a> |
  <a href="/webtech/Lab4/registration.php">Registration</a>
</nav>';
}
