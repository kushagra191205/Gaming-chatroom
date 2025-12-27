<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "chatroom";

$con = mysqli_connect($server,$username,$password,$database );

if (!$con) {
    die("Connection Failed: ".mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if (mysqli_query($con, $sql)) {
    echo "Table 'users' created";
}
else {
    echo "Error Creating Table";
}    
mysqli_close($con);
?>