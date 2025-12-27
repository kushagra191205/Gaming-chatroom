<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameMatch | Sign Up</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            backdrop-filter: blur(10px);
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
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
        
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
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
        
        .signup-card {
            width: 100%;
            max-width: 500px;
            background: rgba(18, 18, 18, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 10;
            overflow: hidden;
        }
        
        .signup-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(138, 43, 226, 0.1), transparent);
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
        
        .signup-card h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--accent);
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: var(--light);
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(138, 43, 226, 0.2);
        }
        
        .submit-btn {
            width: 100%;
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: bold;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(138, 43, 226, 0.3);
        }
        
        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            color: #aaa;
        }
        
        .footer-text a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .footer-text a:hover {
            color: var(--secondary);
        }
        
        .social-signup {
            margin-top: 2rem;
            text-align: center;
        }
        
        .social-signup p {
            color: #aaa;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .social-signup p::before,
        .social-signup p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .social-signup p::before {
            left: 0;
        }
        
        .social-signup p::after {
            right: 0;
        }
        
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--light);
            font-size: 1.5rem;
            transition: background-color 0.3s, transform 0.3s;
        }
        
        .social-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
        }
        
        .terms {
            margin-top: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .terms input {
            margin-top: 0.25rem;
            accent-color: var(--primary);
        }
        
        .terms label {
            font-size: 0.9rem;
            color: #aaa;
            line-height: 1.4;
        }
        
        .terms label a {
            color: var(--accent);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .terms label a:hover {
            color: var(--secondary);
        }
        
        .form-row {
            display: flex;
            gap: 1rem;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .avatar-selection {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .avatar-option {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s, transform 0.3s;
        }
        
        .avatar-option:hover {
            transform: scale(1.1);
        }
        
        .avatar-option.selected {
            border-color: var(--accent);
        }
        
        .avatar-option img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .form-title {
            font-size: 1.2rem;
            color: var(--accent);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-icon {
            font-size: 1.5rem;
        }

        @media (max-width: 576px) {
            .signup-card {
                padding: 2rem;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">GameMatch</a>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Games</a>
            <a href="#">Chatrooms</a>
            <a href="#">About Us</a>
        </div>
    </nav>
    
    <div class="container">
        <div class="animated-bg">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        
        <div class="signup-card">
            <h2>Create Account</h2>
            <form action="process_signup.php" method="POST" id="signup-form">
                <div class="form-title"><span class="form-icon">👤</span> Personal Info</div>
                
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Choose a unique username" required>
                </div>
                <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" required>
                </div>
                
                
                <button type="submit" class="submit-btn">Create Account</button>
                
                <div class="footer-text">
                    Already have an account? <a href="login.php">Login</a>
                </div>
                
                <div class="social-signup">
                    <p>Or sign up with</p>
                    <div class="social-buttons">
                        <a href="#" class="social-btn">🎮</a>
                        <a href="#" class="social-btn">👾</a>
                        <a href="#" class="social-btn">🎯</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
