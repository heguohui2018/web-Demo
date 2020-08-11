<?php

include('../config/db.php');

echo $_SESSION['firstname'];
echo $_SESSION['lastname'];
echo $_SESSION['email'];
?>

<a href="logout.php">Logout</a>
