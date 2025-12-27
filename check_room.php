<?php
$database = 'chatroom';
$conn = new mysqli("localhost", "root", "", $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$room_code = $_POST['room_code'];

if (!empty($room_code)) {
    $stmt = $conn->prepare("SELECT room_name FROM room_info WHERE room_code = ?");
    $stmt->bind_param("s", $room_code);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if room exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the row
        $room_name = $row['room_name'];

        session_start();
        $_SESSION['room_code'] = $room_code;
        $_SESSION['room_name'] = $room_name;

        echo 'valid';
    } else {
        echo 'invalid';
    }

    $stmt->close();
} else {
    echo 'invalid';
}

$conn->close();
?>
