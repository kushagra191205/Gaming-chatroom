<?php 
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        // Checking agar username exist krta h 
        $check_stmt = mysqli_prepare($con, "SELECT * FROM users WHERE username = ?");
        mysqli_stmt_bind_param($check_stmt, "s", $username);
        mysqli_stmt_execute($check_stmt);
        $result = mysqli_stmt_get_result($check_stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username already exists!'); window.history.back();</script>";
            exit;
        }

        $insert_stmt = mysqli_prepare($con, "INSERT INTO users (username, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($insert_stmt, "ss", $username, $password);

        if (mysqli_stmt_execute($insert_stmt)) {
            echo "<script>alert('SignUp Successful! You can now LogIn'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }

    } else {
        echo "<script>alert('Please fill all fields'); window.history.back();</script>";
    }

    mysqli_close($con);
}
?>
