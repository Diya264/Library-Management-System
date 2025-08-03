<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Fine_Range  = $_POST['Fine_Range'];
    $Fine_Amount = $_POST['Fine_Amount'];

    try {
        $sql = "INSERT INTO fine_details (Fine_Range, Fine_Amount) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Fine_Range, $Fine_Amount]);

        // Redirect back to main fine details page
        header("Location: fine_details.php");
        exit();
    } catch (PDOException $e) {
        $error = "⚠️ Error adding fine details: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Fine Details</title>
<style>
body {
    font-family: 'Georgia', serif;
    background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
    color: #2c1810;
    min-height: 100vh;
    padding: 20px;
}
.card {
    max-width: 600px;
    margin: 40px auto;
    background: #f5e6d3;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    border: 3px solid #8b4513;
}
h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 32px;
}
form {
    display: grid;
    gap: 15px;
}
label {
    font-weight: bold;
}
input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}
button {
    padding: 12px 20px;
    background: linear-gradient(135deg, #cd853f 0%, #d2691e 100%);
    border: none;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background: linear-gradient(135deg, #d2691e 0%, #cd853f 100%);
}
.back-btn {
    background: #8b4513;
    margin-top: 10px;
}
</style>
</head>
<body>
<div class="card">
<h1>➕ Add Fine Details</h1>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    <label>Fine Range:</label>
    <input type="text" name="Fine_Range" placeholder="e.g. 1-5 days late" required>

    <label>Fine Amount:</label>
    <input type="number" step="0.01" name="Fine_Amount" placeholder="e.g. 50" required>

    <button type="submit">💾 Save Fine</button>
</form>
<button class="back-btn" onclick="window.location.href='fine_details.php';">⬅ Back</button>
</div>
</body>
</html>
