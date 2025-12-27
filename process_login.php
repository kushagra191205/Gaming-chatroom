<?php 
include 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = mysqli_prepare($con, "SELECT user_id, username, password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: dashboard.php");
            $_SESSION['username'] = $username;
            exit();
        } else {
            echo "<script>alert('Incorrect Password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User Not Found!!'); window.history.back();</script>";
    }

    mysqli_close($con);
}
?>
