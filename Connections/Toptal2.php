<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Toptal2 = "localhost";
$datbase_Toptal2 = "Toptal2";
$username_Toptal2 = "Toptal";
$password_Toptal2 = "ToptalOK";
$Toptal2 = mysqli_connect("p:" . $hostname_Toptal2, $username_Toptal2, $password_Toptal2, $datbase_Toptal2); 
if (!$Toptal2) {
    echo "<p>Error: Unable to connect to MySQL Toptal2 database." . PHP_EOL . "</p>";
    echo "<p>Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "</p>";
    echo "<p>Debugging error: " . mysqli_connect_error() . PHP_EOL . "</p>";
    exit;
}?>
