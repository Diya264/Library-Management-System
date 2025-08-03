<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            background: 
                linear-gradient(135deg, rgba(101, 67, 33, 0.9) 0%, rgba(139, 69, 19, 0.8) 100%),
                url('futlib.jpg');
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            min-height: 100vh;
            color: #2c1810;
        }

        /* Wooden texture overlay */
        .wood-texture {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(139, 69, 19, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(160, 82, 45, 0.1) 0%, transparent 50%);
            z-index: -1;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
            padding: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            border-bottom: 3px solid #654321;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #d2691e, #cd853f);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c1810;
            font-size: 32px;
            font-weight: bold;
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.3),
                0 4px 8px rgba(0, 0, 0, 0.3);
            border: 2px solid #8b4513;
        }

        .logo-text {
            color: #f5e6d3;
            font-size: 32px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-family: 'Georgia', serif;
        }

        .logout-btn {
            background: linear-gradient(135deg, #cd853f 0%, #d2691e 100%);
            color: #2c1810;
            border: 2px solid #8b4513;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.3),
                0 4px 8px rgba(0, 0, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Georgia', serif;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #d2691e 0%, #cd853f 100%);
            transform: translateY(-2px);
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.4),
                0 6px 12px rgba(0, 0, 0, 0.4);
        }

        /* Main Container */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .dashboard-title {
            text-align: center;
            color: #f5e6d3;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
            font-family: 'Georgia', serif;
            letter-spacing: 2px;
        }

        .dashboard-subtitle {
            text-align: center;
            color: #e6d7c3;
            font-size: 18px;
            margin-bottom: 50px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            font-style: italic;
            font-family: 'Georgia', serif;
        }

        /* Options Grid */
        .options-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .option-card {
            background: linear-gradient(135deg, #f5e6d3 0%, #e6d7c3 100%);
            border: 3px solid #8b4513;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 8px 20px rgba(0, 0, 0, 0.3),
                inset 0 2px 4px rgba(255, 255, 255, 0.5);
            animation: slideInUp 0.8s ease-out;
        }

        .option-card:nth-child(1) { animation-delay: 0.1s; }
        .option-card:nth-child(2) { animation-delay: 0.2s; }
        .option-card:nth-child(3) { animation-delay: 0.3s; }
        .option-card:nth-child(4) { animation-delay: 0.4s; }
        .option-card:nth-child(5) { animation-delay: 0.5s; }

        .option-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #cd853f, #d2691e, #8b4513);
            border-radius: 12px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .option-card:hover::before {
            opacity: 1;
        }

        .option-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 
                0 15px 30px rgba(0, 0, 0, 0.4),
                inset 0 2px 4px rgba(255, 255, 255, 0.6);
            background: linear-gradient(135deg, #f5e6d3 0%, #f0e1ce 100%);
        }

        .card-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(45deg, #8b4513, #a0522d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: #f5e6d3;
            box-shadow: 
                0 6px 15px rgba(0, 0, 0, 0.3),
                inset 0 2px 4px rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            border: 3px solid #654321;
        }

        .option-card:hover .card-icon {
            transform: scale(1.1) rotate(-5deg);
            box-shadow: 
                0 8px 20px rgba(0, 0, 0, 0.4),
                inset 0 2px 4px rgba(255, 255, 255, 0.3);
        }

        .card-title {
            color: #2c1810;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
            font-family: 'Georgia', serif;
        }

        .card-description {
            color: #4a3429;
            font-size: 15px;
            margin-bottom: 25px;
            line-height: 1.6;
            font-family: 'Georgia', serif;
        }

        .card-button {
            background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
            color: #f5e6d3;
            border: 2px solid #654321;
            padding: 14px 32px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.2),
                0 4px 8px rgba(0, 0, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Georgia', serif;
        }

        .card-button:hover {
            background: linear-gradient(135deg, #a0522d 0%, #8b4513 100%);
            transform: translateY(-2px);
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.3),
                0 6px 12px rgba(0, 0, 0, 0.4);
        }

        /* Book spine decorations */
        .book-spines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: repeating-linear-gradient(
                90deg,
                #8b4513 0px,
                #8b4513 20px,
                #a0522d 20px,
                #a0522d 40px,
                #cd853f 40px,
                #cd853f 60px
            );
        }

        .option-card .book-spines {
            top: 0;
            height: 4px;
            background: repeating-linear-gradient(
                90deg,
                #8b4513 0px,
                #8b4513 15px,
                #a0522d 15px,
                #a0522d 30px,
                #cd853f 30px,
                #cd853f 45px
            );
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 20px;
            }

            .dashboard-title {
                font-size: 36px;
            }

            .options-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .option-card {
                padding: 25px;
            }

            .card-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
            }
        }

        /* Library-specific icons using text */
        .book-icon::before { content: "📚"; }
        .issue-icon::before { content: "📋"; }
        .members-icon::before { content: "👥"; }
        .fine-icon::before { content: "💰"; }
        .supplier-icon::before { content: "🏢"; }

        /* Decorative elements */
        .ornament {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #8b4513;
            opacity: 0.3;
        }

        .ornament::before {
            content: "❦";
        }
    </style>
</head>
<body>
    <div class="wood-texture"></div>
    
    <header class="header">
        <div class="book-spines"></div>
        <div class="header-content">
            <div class="logo">
                <div class="logo-icon">📖</div>
                <div class="logo-text">Library Central</div>
            </div>
            <form action="logout.php" method="post">
                <button type="submit" class="logout-btn">LOG ME OUT</button>
            </form>
        </div>
    </header>

    <main class="main-container">
        <h1 class="dashboard-title">Library Management System</h1>
        <p class="dashboard-subtitle">"A room without books is like a body without a soul" - Marcus Tullius Cicero</p>
        
        <div class="options-grid">
            <div class="option-card">
                <div class="book-spines"></div>
                <div class="ornament"></div>
                <div class="card-icon book-icon"></div>
                <h3 class="card-title">Book Details</h3>
                <p class="card-description">Explore and manage your entire book collection. Search, categorize, and maintain detailed records of all literary treasures in your library.</p>
                <form action="bookDetails.php" method="GET">
                    <button type="submit" class="card-button">Browse Collection</button>
                </form>
            </div>

            <div class="option-card">
                <div class="book-spines"></div>
                <div class="ornament"></div>
                <div class="card-icon issue-icon"></div>
                <h3 class="card-title">Book Issue</h3>
                <p class="card-description">Facilitate the lending process with our streamlined book issuance system. Track borrowers and manage return schedules efficiently.</p>
                <form action="bookIssue.php" method="GET">
                    <button type="submit" class="card-button">Issue Books</button>
                </form>
            </div>

            <div class="option-card">
                <div class="book-spines"></div>
                <div class="ornament"></div>
                <div class="card-icon members-icon"></div>
                <h3 class="card-title">Members</h3>
                <p class="card-description">Manage your library community. Register new members, update profiles, and maintain comprehensive member records and histories.</p>
                <form action="Members.php" method="GET">
                    <button type="submit" class="card-button">Member Registry</button>
                </form>
            </div>

            <div class="option-card">
                <div class="book-spines"></div>
                <div class="ornament"></div>
                <div class="card-icon fine-icon"></div>
                <h3 class="card-title">Fine Details</h3>
                <p class="card-description">Monitor overdue items and manage penalty collections. Keep track of outstanding fines and maintain fair lending policies.</p>
                <form action="fine_details.php" method="GET">
                    <button type="submit" class="card-button">Fine Management</button>
                </form>
            </div>

            <div class="option-card">
                <div class="book-spines"></div>
                <div class="ornament"></div>
                <div class="card-icon supplier-icon"></div>
                <h3 class="card-title">Supplier Details</h3>
                <p class="card-description">Coordinate with publishers and distributors. Manage supplier relationships and streamline your book acquisition processes.</p>
                <form action="supplierDetails.php" method="GET">
                    <button type="submit" class="card-button">Supplier Network</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

















































































<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
body {
    font-family:'Courier New', Courier, monospace;
    font-weight: bold;
    margin: 0;
    padding: 0;
    background-image: url(futlib.jpg);
    background-position: center;
}
.logout-btn {
    display: relative;
    margin-top: 20px;
    margin-left: 20px;
    font-size: 18px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    width: 150px;
    height: 50px;
    padding:10px;
    text-decoration-color: purple;
    background-color: #ad576f;
    border: none;
    cursor: pointer;
    border-radius:10px; 
    transition: background-color 0.3s ease;
}

.logout-btn:hover {
    background-color: #ed95ae;
    transform: scale(1.1);
}

.options-container {
    position: relative;
    display: flex;
    margin: 10% 0 10% 0;
    width: 100%;
    background-color: #fff;  
    justify-content: center;
}

.options {
    position: relative;
    margin: 10% 20% 10% 15%;
    width: 70%;
    display: flex;
    flex-flow: wrap;
    justify-content: space-evenly;
}

.options form {
    margin: 20px;
    text-align: center;

}
.options button {
    display: inline-block;
    font-size: 20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    justify-content: center;
    padding:20px;
    width: 200px;
    background-color: #de6464;
    transition: background-color 0.3s ease;
    cursor: pointer;
    border: none;
    border-radius: 10px;
}

.options button:hover {
    background-color: lightcoral;
    transform: scale(1.1);
}

@media (max-width: 768px) {
            .options-container {
                max-width: 400px;
            }

            .options button {
                width: 100%;
            }
        }

</style>
<body>
        <form action = "logout.php" method = "post">
            <button type = "submit" class = "logout-btn" >LOG ME OUT</button>
        </form>

        <div class = "options">
            <form action = "bookDetails.php" method = "GET">
                <button type = "submit">Book Details</button>
            </form>
            <form action = "bookIssue.php" method = "GET">
                <button type = "submit">Book Issue</button>
            </form>
            <form action = "Members.php" method = "GET">
                <button type = "submit">Members</button>
            </form>
            <form action = "fineDetails.php" method = "GET" >
                <button type = "submit">Fine Details</button>
            </form>
            <form action = supplierDetails.php method = "GET">
                <button type = "submit">Supplier Details</button>
            </form>
        </div>
</body>
</html> -->