<?php
include 'connect.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Book_Code     = $_POST['Book_Code'];
    $Book_Title    = $_POST['Book_Title'];
    $Category      = $_POST['Category'];
    $Author        = $_POST['Author'];
    $Publication   = $_POST['Publication'];
    $Publish_Date  = $_POST['Publish_Date'];
    $Book_Edition  = $_POST['Book_Edition'];
    $Price         = $_POST['Price'];
    $Date_Arrival  = $_POST['Date_Arrival'];
    $SupplierID    = $_POST['SupplierID'];
    $Rack_No       = $_POST['Rack_No'];

    try {
        $sql = "INSERT INTO book_details 
        (Book_Code, Book_Title, Category, Author, Publication, Publish_Date, Book_Edition, Price, Date_Arrival, SupplierID, Rack_No)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $Book_Code, $Book_Title, $Category, $Author, $Publication, $Publish_Date,
            $Book_Edition, $Price, $Date_Arrival, $SupplierID, $Rack_No
        ]);

        // Redirect back to book details page after successful insert
        header("Location: bookDetails.php");
        exit();
    } catch (PDOException $e) {
        $errorMsg = "Error adding book: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Book</title>
<style>
body {
    font-family: 'Georgia', serif;
    background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
    color: #2c1810;
    min-height: 100vh;
    padding: 20px;
}
.card {
    max-width: 800px;
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
}
form {
    display: grid;
    gap: 15px;
}
label {
    font-weight: bold;
}
input[type="text"],
input[type="date"],
input[type="number"] {
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
<h1>➕ Add New Book</h1>
<?php if (!empty($errorMsg)) echo "<p style='color:red;'>$errorMsg</p>"; ?>

<form method="POST">
    <label>Book Code:</label>
    <input type="text" name="Book_Code" required>

    <label>Book Title:</label>
    <input type="text" name="Book_Title" required>

    <label>Category:</label>
    <input type="text" name="Category" required>

    <label>Author:</label>
    <input type="text" name="Author" required>

    <label>Publication:</label>
    <input type="text" name="Publication" required>

    <label>Publish Date:</label>
    <input type="date" name="Publish_Date" required>

    <label>Book Edition:</label>
    <input type="text" name="Book_Edition" required>

    <label>Price:</label>
    <input type="number" step="0.01" name="Price" required>

    <label>Date Arrival:</label>
    <input type="date" name="Date_Arrival" required>

    <label>Supplier ID:</label>
    <input type="text" name="SupplierID" required>

    <label>Rack No:</label>
    <input type="text" name="Rack_No" required>

    <button type="submit">📥 Save Book</button>
</form>
<button class="back-btn" onclick="window.location.href='bookDetails.php';">⬅ Back</button>
</div>
</body>
</html>
