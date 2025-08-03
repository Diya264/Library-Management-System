<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fine Details</title>
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
        padding: 20px;
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
        margin-bottom: 30px;
        border-radius: 0 0 12px 12px;
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

    .breadcrumb {
        color: #e6d7c3;
        font-size: 16px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    .breadcrumb a {
        color: #f5e6d3;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb a:hover {
        color: #cd853f;
    }

    /* Main Card */
    .card {
        background: linear-gradient(135deg, #f5e6d3 0%, #e6d7c3 100%);
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 
            0 12px 30px rgba(0, 0, 0, 0.4),
            inset 0 2px 4px rgba(255, 255, 255, 0.5);
        border: 3px solid #8b4513;
        position: relative;
        overflow: hidden;
    }

    /* Book spine decoration */
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

    .ornament {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 32px;
        color: #8b4513;
        opacity: 0.3;
    }

    .ornament::before {
        content: "❦";
    }

    h1 {
        font-family: 'Georgia', serif;
        text-align: center;
        margin: 30px 0;
        color: #2c1810;
        font-size: 42px;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(139, 69, 19, 0.3);
        position: relative;
    }

    h1::after {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, #8b4513, #cd853f);
        margin: 15px auto;
        border-radius: 2px;
    }

    /* Table Container */
    .table-container {
        overflow-x: auto;
        margin: 30px 0;
        border-radius: 8px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Georgia', serif;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    th {
        background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
        color: #f5e6d3;
        padding: 18px 15px;
        text-align: left;
        font-weight: 600;
        font-size: 16px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        border-bottom: 2px solid #654321;
    }

    td {
        padding: 15px;
        border-bottom: 1px solid #e6d7c3;
        color: #2c1810;
        font-size: 15px;
        transition: background-color 0.3s ease;
    }

    tr:hover td {
        background-color: #f9f4ec;
    }

    tr:nth-child(even) td {
        background-color: #f5f0e6;
    }

    tr:nth-child(even):hover td {
        background-color: #f0e8d8;
    }

    /* Button Styles */
    .button-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    button {
        background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
        color: #f5e6d3;
        border: 2px solid #654321;
        padding: 14px 28px;
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
        min-width: 120px;
    }

    button:hover {
        background: linear-gradient(135deg, #a0522d 0%, #8b4513 100%);
        transform: translateY(-2px);
        box-shadow: 
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            0 6px 12px rgba(0, 0, 0, 0.4);
    }

    button:active {
        transform: translateY(0);
    }

    /* Add Fine Details Button - Special Style */
    .add-btn {
        background: linear-gradient(135deg, #cd853f 0%, #d2691e 100%);
        border: 2px solid #8b4513;
    }

    .add-btn:hover {
        background: linear-gradient(135deg, #d2691e 0%, #cd853f 100%);
    }

    /* No Data Message */
    .no-data {
        text-align: center;
        color: #8b4513;
        font-size: 18px;
        font-style: italic;
        margin: 40px 0;
        padding: 30px;
        background: rgba(139, 69, 19, 0.1);
        border-radius: 8px;
        border: 2px dashed #8b4513;
    }

    /* Fine Stats */
    .stats-container {
        display: flex;
        justify-content: space-around;
        margin: 20px 0;
        flex-wrap: wrap;
        gap: 20px;
    }

    .stat-item {
        background: linear-gradient(135deg, #cd853f 0%, #d2691e 100%);
        color: #2c1810;
        padding: 15px 25px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            0 4px 8px rgba(0, 0, 0, 0.2);
        border: 2px solid #8b4513;
        min-width: 150px;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 700;
        display: block;
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .header-content {
            flex-direction: column;
            gap: 15px;
        }

        .card {
            padding: 20px;
            margin: 10px;
        }

        h1 {
            font-size: 32px;
        }

        .button-container {
            flex-direction: column;
            align-items: center;
        }

        button {
            width: 100%;
            max-width: 250px;
        }

        .stats-container {
            flex-direction: column;
            align-items: center;
        }

        .stat-item {
            width: 100%;
            max-width: 200px;
        }
    }

    @media (max-width: 480px) {
        th, td {
            padding: 10px 8px;
            font-size: 14px;
        }
    }
  </style>
</head>
<body>
    <div class="wood-texture"></div>
    
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <div class="logo-icon">📖</div>
                <div class="logo-text">Library Central</div>
            </div>
            <div class="breadcrumb">
                <a href="dashboard.php">Dashboard</a> → Fine Details
            </div>
        </div>
    </header>

    <div class="card">
        <div class="book-spines"></div>
        <div class="ornament"></div>
        <h1>💰 Fine Details</h1>

        <?php
            include 'connect.php';

            try {
                $stmt = $pdo->query("SELECT * FROM fine_details");
                $rowCount = $stmt->rowCount();

                if ($rowCount > 0) {
                    // Display stats
                    echo "<div class='stats-container'>";
                    echo "<div class='stat-item'>";
                    echo "<span class='stat-number'>$rowCount</span>";
                    echo "<span class='stat-label'>Fine Ranges</span>";
                    echo "</div>";
                    echo "</div>";
                    
                    echo "<div class='table-container'>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Fine Range</th>";
                    echo "<th>Fine Amount</th>";
                    echo "</tr>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row["Fine_Range"]."</td>";
                        echo "<td>".$row["Fine_Amount"]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";

                } else {
                    echo "<div class='no-data'>";
                    echo "<p>📋 No fine details found in the library system.</p>";
                    echo "<p>Start by adding fine details to manage overdue penalties.</p>";
                    echo "</div>";
                }
            } catch (PDOException $e) {
                echo "<div class='no-data' style='color: #8b0000;'>";
                echo "<p>⚠️ Error connecting to database: " . htmlspecialchars($e->getMessage()) . "</p>";
                echo "</div>";
            }
        ?>

        <div class="button-container">
            <button class="add-btn" onclick="window.location.href = 'add_fine_details.php';">
                ➕ Add Fine Details
            </button>
            <button onclick="window.location.href='dashboard.php';">
                🏠 Back to Dashboard
            </button>
        </div>
    </div>
</body>
</html>