<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameMatch | Join Chatroom</title>
    <style>
        :root {
            --primary: #8a2be2;
            --secondary: #ff3e9d;
            --dark: #121212;
            --light: #f0f0f0;
            --accent: #00c2ff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: rgba(0, 0, 0, 0.7);
            color: var(--light);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            position: relative;
        }
        
        .popup-container {
            width: 100%;
            max-width: 500px;
            background: rgba(18, 18, 18, 0.9);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 10;
        }
        
        .popup-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(0, 194, 255, 0.1), transparent);
            z-index: -1;
            transform: rotate(45deg);
            animation: shine 6s infinite linear;
        }
        
        @keyframes shine {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }
        
        .popup-header {
            background: linear-gradient(90deg, var(--accent), var(--primary));
            padding: 1.5rem;
            text-align: center;
            position: relative;
        }
        
        .popup-header h2 {
            font-size: 1.8rem;
            color: white;
            font-weight: 600;
        }
        
        .close-btn {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            opacity: 0.8;
            transition: opacity 0.3s, transform 0.3s;
        }
        
        .close-btn:hover {
            opacity: 1;
            transform: scale(1.1);
        }
        
        .popup-content {
            padding: 2.5rem;
        }
        
        .form-group {
            margin-bottom: 2rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 500;
            color: var(--accent);
        }
        
        input {
            width: 100%;
            padding: 0.9rem 1.2rem;
            font-size: 1rem;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: var(--light);
            transition: border-color 0.3s, box-shadow 0.3s;
            letter-spacing: 3px;
            text-align: center;
            font-size: 1.2rem;
        }
        
        input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(0, 194, 255, 0.2);
        }
        
        .join-btn {
            width: 100%;
            padding: 0.9rem;
            font-size: 1.1rem;
            font-weight: bold;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .join-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 194, 255, 0.3);
        }
        
        /* Success screen styles */
        .success-screen {
            display: none; /* Will be toggled to display:block after joining */
            text-align: center;
            padding: 2.5rem;
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 194, 255, 0.3);
        }
        
        .success-screen h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .success-screen p {
            color: #aaa;
            margin-bottom: 1.5rem;
        }
        
        .room-info {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(0, 194, 255, 0.2);
            border-radius: 10px;
            padding: 1.2rem;
            font-size: 1.2rem;
            color: var(--light);
            margin: 1.5rem 0;
            text-align: left;
        }
        
        .room-info h3 {
            color: var(--accent);
            margin-bottom: 0.5rem;
            font-size: 1.4rem;
        }
        
        .enter-room-btn {
            width: 100%;
            padding: 0.9rem;
            font-size: 1.1rem;
            font-weight: bold;
            background: linear-gradient(90deg, var(--accent), #00a0cc);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .enter-room-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 194, 255, 0.3);
        }
        
        .note {
            font-size: 0.9rem;
            color: #777;
            margin-top: 1.5rem;
        }
        
        .help-text {
            font-size: 0.85rem;
            color: #777;
            margin-top: 0.5rem;
            font-style: italic;
        }
        
        /* Animated background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 15s infinite ease-in-out;
        }

        .circle:nth-child(1) {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 10%;
            background: radial-gradient(circle, var(--primary), transparent);
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 400px;
            height: 400px;
            top: 40%;
            right: 10%;
            background: radial-gradient(circle, var(--secondary), transparent);
            animation-delay: 5s;
        }

        .circle:nth-child(3) {
            width: 200px;
            height: 200px;
            bottom: 10%;
            left: 30%;
            background: radial-gradient(circle, var(--accent), transparent);
            animation-delay: 10s;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(30px, 20px);
            }
            100% {
                transform: translate(0, 0);
            }
        }
    </style>
</head>
<body>
    <div class="animated-bg">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
    
    <div class="popup-container">
        <!-- Join Room Form -->
        <div class="join-form">
            <div class="popup-header">
                <h2>Join Chatroom</h2>
                <button class="close-btn">×</button>
            </div>
            <div class="popup-content">
                <div class="form-group">
                    <label for="room-code">Enter Room Code</label>
                    <input type="text" id="room-code" placeholder="XXXXXX" maxlength="6" required>
                    <p class="help-text">Enter the 6-character code provided by the room creator</p>
                </div>
                <button class="join-btn" onclick="checkRoomAndJoin()">Join Chatroom</button>
            </div>
        </div>


        <script>
function checkRoomAndJoin() {
    const roomCode = document.getElementById('room-code').value;

    if (roomCode.length !== 6) {
        alert("Please enter a valid 6-character room code.");
        return;
    }

    fetch('check_room.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `room_code=${encodeURIComponent(roomCode)}`
    })
    .then(response => response.text())
    .then(data => {
    if (data === 'valid') {
        // PHP already set session if valid
        window.location.href = `game-platform-with-chat.php`;
    } else {
        alert('Invalid Room Code');
    }
})
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
}
</script>

</body>
</html>
