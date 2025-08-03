<?php
include 'connect.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Book_Issue_No = $_POST['Book_Issue_No'];
    $MemberID      = $_POST['MemberID'];
    $Book_Code     = $_POST['Book_Code'];
    $Date_Issue    = $_POST['Date_Issue'];
    $Date_Return   = $_POST['Date_Return'];
    $Date_Returned = $_POST['Date_Returned'];
    $Fine_Range    = $_POST['Fine_Range'];

    try {
        $sql = "INSERT INTO book_issue 
        (Book_Issue_No, MemberID, Book_Code, Date_Issue, Date_Return, Date_Returned, Fine_Range)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $Book_Issue_No, $MemberID, $Book_Code,
            $Date_Issue, $Date_Return, $Date_Returned, $Fine_Range
        ]);

        // Redirect back after successful insert
        header("Location: bookIssue.php");
        exit();
    } catch (PDOException $e) {
        $errorMsg = "Error issuing book: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Issue New Book</title>
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
<h1>➕ Issue New Book</h1>
<?php if (!empty($errorMsg)) echo "<p style='color:red;'>$errorMsg</p>"; ?>

<form method="POST">
    <label>Book Issue Number:</label>
    <input type="text" name="Book_Issue_No" required>

    <label>Member ID:</label>
    <input type="text" name="MemberID" required>

    <label>Book Code:</label>
    <input type="text" name="Book_Code" required>

    <label>Date Issue:</label>
    <input type="date" name="Date_Issue" required>

    <label>Return Date:</label>
    <input type="date" name="Date_Return" required>

    <label>Date Returned (leave blank if not returned):</label>
    <input type="date" name="Date_Returned">

    <label>Fine Range:</label>
    <input type="number" step="0.01" name="Fine_Range">

    <button type="submit">📥 Save Issue</button>
</form>
<button class="back-btn" onclick="window.location.href='bookIssue.php';">⬅ Back</button>
</div>
</body>
</html>
