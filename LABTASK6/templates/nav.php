<nav>
<?php
if (isset($_SESSION['uname'])) {
    echo '<span>Logged in as '.$_SESSION['uname'] .'</span> | ';
    echo '<a href="logout.php">Logout</a>';
} else {
    echo '
  <a href="/webtech/Lab6/">Home</a> |
  <a href="/webtech/Lab6/login.php">Login</a> |
  <a href="/webtech/Lab6/registration.php">Registration</a>
</nav>';
}
