<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MemberID          = $_POST['MemberID'];
    $Member_Name       = $_POST['Member_Name'];
    $City              = $_POST['City'];
    $Register_Date     = $_POST['Register_Date'];
    $Expire_Date       = $_POST['Expire_Date'];
    $Membership_Status = $_POST['Membership_Status'];

    try {
        $sql = "INSERT INTO members (MemberID, Member_Name, City, Register_Date, Expire_Date, Membership_Status)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $MemberID,
            $Member_Name,
            $City,
            $Register_Date,
            $Expire_Date,
            $Membership_Status
        ]);

        // Redirect to members page after successful insert
        header("Location: members.php");
        exit();
    } catch (PDOException $e) {
        $error = "⚠️ Error adding member: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Member</title>
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
input, select {
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
<h1>➕ Add New Member</h1>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    <label>Member ID:</label>
    <input type="text" name="MemberID" required>

    <label>Member Name:</label>
    <input type="text" name="Member_Name" required>

    <label>City:</label>
    <input type="text" name="City" required>

    <label>Register Date:</label>
    <input type="date" name="Register_Date" required>

    <label>Expire Date:</label>
    <input type="date" name="Expire_Date" required>

    <label>Membership Status:</label>
    <select name="Membership_Status" required>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
        <option value="Expired">Expired</option>
    </select>

    <button type="submit">💾 Save Member</button>
</form>
<button class="back-btn" onclick="window.location.href='members.php';">⬅ Back</button>
</div>
</body>
</html>
