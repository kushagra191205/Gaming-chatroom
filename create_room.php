<?php
session_start(); // Start session at the top

$room_name = $_POST['room_name'] ?? '';
$room_code = $_POST['room_code'] ?? '';

if (!empty($room_name) && !empty($room_code)) {
    $conn = new mysqli("localhost", "root", "", "chatroom");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO room_info (room_name, room_code) VALUES (?, ?)");
    $stmt->bind_param("ss", $room_name, $room_code);

    if ($stmt->execute()) {
        // Store values in session so game-platform-with-chat.php can access them
        $_SESSION['room_name'] = $room_name;
        $_SESSION['room_code'] = $room_code;
        echo "success";
    } else {
        echo "failed";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "invalid";
}
?>
