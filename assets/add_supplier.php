<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $SupplierID    = $_POST['SupplierID'];
    $Supplier_Name = $_POST['Supplier_Name'];
    $Address       = $_POST['Address'];
    $Contact       = $_POST['Contact'];
    $Email         = $_POST['Email'];

    try {
        $sql = "INSERT INTO supplier_details (SupplierID, Supplier_Name, Address, Contact, Email)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$SupplierID, $Supplier_Name, $Address, $Contact, $Email]);

        // redirect after successful insert
        header("Location: supplierDetails.php");
        exit();
    } catch (PDOException $e) {
        $error = "⚠️ Error adding supplier: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Supplier</title>
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
    font-size: 36px;
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
<h1>➕ Add New Supplier</h1>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    <label>Supplier ID:</label>
    <input type="text" name="SupplierID" required>

    <label>Supplier Name:</label>
    <input type="text" name="Supplier_Name" required>

    <label>Address:</label>
    <input type="text" name="Address" required>

    <label>Contact:</label>
    <input type="text" name="Contact" required>

    <label>Email:</label>
    <input type="email" name="Email" required>

    <button type="submit">💾 Save Supplier</button>
</form>
<button class="back-btn" onclick="window.location.href='supplierDetails.php';">⬅ Back</button>
</div>
</body>
</html>
