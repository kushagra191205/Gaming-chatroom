
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameMatch | Find Your Gaming Squad</title>
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
            background-color: var(--dark);
            color: var(--light);
            overflow-x: hidden;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            width: 100%;
            z-index: 100;
            backdrop-filter: blur(10px);
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--accent);
        }
        
        .cta-button {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(138, 43, 226, 0.3);
        }
        
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 5%;
            position: relative;
            overflow: hidden;
        }
        
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 100%);
            z-index: -1;
        }
        
        .hero-content h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            max-width: 800px;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .secondary-button {
            background: transparent;
            color: var(--light);
            border: 2px solid var(--primary);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }
        
        .secondary-button:hover {
            background: var(--primary);
            color: white;
        }
        
        .features {
            padding: 5rem 10%;
            background-color: #0a0a0a;
        }
        
        .features h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--accent);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: linear-gradient(145deg, #1a1a1a, #151515);
            border-radius: 15px;
            padding: 2rem;
            transition: transform 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--accent);
        }
        
        .games-section {
            padding: 5rem 10%;
        }
        
        .games-section h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--accent);
        }
        
        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        
        .game-card {
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            height: 250px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .game-card:hover {
            transform: scale(1.05);
        }
        
        .game-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .game-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 1rem;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        }
        
        .game-overlay h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        .game-overlay p {
            font-size: 0.9rem;
            color: #ccc;
        }
        
        .active-rooms {
            padding: 5rem 10%;
            background-color: #0a0a0a;
        }
        
        .active-rooms h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--accent);
        }
        
        .rooms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }
        
        .room-card {
            background: linear-gradient(145deg, #1a1a1a, #151515);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .room-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .room-name {
            font-size: 1.3rem;
            color: var(--accent);
        }
        
        .room-game {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #ccc;
        }
        
        .room-game img {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
        
        .room-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        
        .room-players, .room-status {
            font-size: 0.9rem;
            color: #ccc;
        }
        
        .room-status.open {
            color: #00ff00;
        }
        
        .room-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .join-button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            flex: 1;
            transition: background 0.3s;
        }
        
        .join-button:hover {
            background: #7a21d9;
        }
        
        .footer {
            background-color: #0a0a0a;
            color: #ccc;
            padding: 3rem 10%;
            text-align: center;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section {
            flex: 1;
            min-width: 200px;
        }
        
        .footer-section h3 {
            color: var(--accent);
            margin-bottom: 1rem;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 0.5rem;
        }
        
        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-section ul li a:hover {
            color: var(--accent);
        }
        
        .copyright {
            border-top: 1px solid #333;
            padding-top: 1rem;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1.2rem;
            }
            
            .nav-links {
                display: none;
            }
        }

        /* Animated background */
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, var(--primary), transparent);
            opacity: 0.1;
            animation: float 15s infinite ease-in-out;
        }

        .circle:nth-child(1) {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 10%;
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
    <nav class="navbar">
        <div class="logo">GameMatch</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Games</a>
            <a href="#">Chatrooms</a>
            <a href="#">About Us</a>
        </div>
        
        <?php if (isset($_SESSION['user_id'])): ?>
        <a class="cta-button" href="logout.php">Logout</a>

        <?php else: ?>
            <a class="cta-button" href="login.php">LogIn</a>
        <?php endif; ?>
    </nav>
    
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="animated-bg">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="hero-content">
            <h1>Find Your Gaming Squad</h1>
            <p>Connect with gamers, join chatrooms, and jump straight into your favorite games together. Never play alone again!</p>
            <div class="hero-buttons">
                <?php if (isset($_SESSION['username'])): ?>
                    <a class="cta-button" href="create-chatroom-popup.php">Create Chatroom</a>
                    <a class="cta-button" href="join-chatroom-popup.php">Join Chatroom</a>
                <?php else: ?>
                    <a class="cta-button" href="login.php">Login to Create Chatroom</a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <section class="features">
        <h2>Why GameMatch?</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">🎮</div>
                <h3>Instant Play</h3>
                <p>Jump directly into games from chatrooms with no additional steps. Get playing faster with your new squad.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔍</div>
                <h3>Find Your Match</h3>
                <p>Join public chatrooms with players who match your skill level and gaming preferences.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Private Rooms</h3>
                <p>Create your own chatrooms for your friends or to meet new players with similar interests.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Track Progress</h3>
                <p>Keep tabs on your gaming stats and improvements across all your favorite games.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Secure Platform</h3>
                <p>A safe environment with moderation tools to ensure positive gaming experiences.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🗣️</div>
                <h3>Voice Chat</h3>
                <p>Integrated voice chat for seamless communication during gameplay and planning.</p>
            </div>
        </div>
    </section>
    
    <section class="games-section">
        <h2>Popular Games</h2>
        <div class="games-grid">
            <div class="game-card">
                <img src="/api/placeholder/400/400" alt="Game 1">
                <div class="game-overlay">
                    <h3>Battle Royale</h3>
                    <p>24,582 active players</p>
                </div>
            </div>
            <div class="game-card">
                <img src="/api/placeholder/400/400" alt="Game 2">
                <div class="game-overlay">
                    <h3>Strategy Masters</h3>
                    <p>15,321 active players</p>
                </div>
            </div>
            <div class="game-card">
                <img src="/api/placeholder/400/400" alt="Game 3">
                <div class="game-overlay">
                    <h3>RPG Chronicles</h3>
                    <p>18,942 active players</p>
                </div>
            </div>
            <div class="game-card">
                <img src="/api/placeholder/400/400" alt="Game 4">
                <div class="game-overlay">
                    <h3>Sports League</h3>
                    <p>9,876 active players</p>
                </div>
            </div>
            <div class="game-card">
                <img src="/api/placeholder/400/400" alt="Game 5">
                <div class="game-overlay">
                    <h3>Racing Evolved</h3>
                    <p>12,456 active players</p>
                </div>
            </div>
            <div class="game-card">
                <img src="/api/placeholder/400/400" alt="Game 6">
                <div class="game-overlay">
                    <h3>Puzzle Quest</h3>
                    <p>7,823 active players</p>
                </div>
            </div>
        </div>
    </section>
    
    
    
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>GameMatch</h3>
                <p>Find your perfect gaming squad and never play alone again.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Games</a></li>
                    <li><a href="#">Chatrooms</a></li>
                    <li><a href="#">Sign Up</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 GameMatch. All rights reserved.
        </div>
    </footer>
</body>
</html>