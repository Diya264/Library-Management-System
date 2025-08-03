<?php
include_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    
    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // User found, redirect to dashboard or another page
        header("Location: dashboard.php");
        exit();
    }
    else {
      // Invalid credentials, set error message
      $message = "Invalid username or password!";
  } 
}
// Retrieve error message from session, if any
$message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
// Unset the session variable to clear the error message
unset($_SESSION['error_message']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

</head>
<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  font-family: 'Poppins', sans-serif;
  height: 100vh;
  width: 100vw;
  background-image: url("img.jpeg");
  background-position: top left;
  /* either this or */
  animation-name: mymove;
  animation-duration: 5s;
  animation-iteration-count:infinite;
  /* else the below code
  animation: mymove 5s infinite 
  */

}

@keyframes mymove {
  50% {background-position: bottom;}
}


.horizontal-line {
  position: relative;
  width: 100%;
  padding: 30px;
  color: #fff;
  font-family: 'Poppins', sans-serif;

  
}

.horizontal-line::after{
  content: '';
  width:300px;
  height:3px;
  background: #4a2e2c;
  position: absolute;
  left: 30px;
  bottom: 25px;
  border-radius: 5px;
}

 .card-box {
width: 100%;
display: flex;
justify-content: center;
}

.card{

  position: relative;
  bottom: 50px;
  background-color: #b5b2b1;
  opacity: 0.5;
  width: 400px;
  min-height: 400px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  display: flex;
  flex-direction:column;
  margin-top: 100px;
  justify-content: center;
}

.form{
  padding: 60px 25px; 
  display: flex;
  flex-direction: column;
}
.form h3{
  font-size: 28px;
  font-weight: 500;
  position: relative;
  margin-bottom: 30px;
  font-family: 'poppins',sans-serif;
}
.form h3::after{
  content: '';
  width:30px;
  height:3px;
  background: #4a2e2c;
  position: absolute;
  left: 0;
  bottom: 2px;
  border-radius: 5px;
}

.input-field{
  width: 200%;
  margin-bottom: 10px;
  position: relative;
}
.input-field input{
  display: block; 
  width: 50%;
  padding: 10px 30px;
  outline: none;
  border:none;
  border-bottom: 2px solid rgb(182, 180, 180);
  font-size: 15px;
}

.form>a{
  color:#7227D5;
  text-decoration: none;
  font-size: 14px;
  margin-bottom: 35px
}

button{
  height: 45px;
  width: 100%;
  background: #4a2e2c;
  border:none;
  color:white;
  border-radius: 5px;
  font-size: 19px;
  cursor: pointer;
  transition: background 0.3s ease; 
}

button:hover {
  background: #80514e; 
}


button+p{
  text-align: center;
  padding-top: 30px;
  font-size: 14px;
}

button+p a{
  text-decoration: none;
  color:#7227D5;
  font-weight: 500;
}

input::placeholder {
  font-family: 'Poppins', sans-serif;
}
</style>
<body>
<div class="horizontal-line"><h1>Library Management System</h1></div>
<div class="card-box">
  <div class="card">
    <div class="form">
      <h3>Login</h3>
      <form action="home.php" method="post">
      <div class="input-field">
          <input type="text" name="username" placeholder="Enter your username"> 
      </div>
      <div class="input-field">
      <input type="password" name="password" placeholder="Enter your password"> 
    </div>
    <?php if (!empty($message)) : ?>
      <p><?php echo $message; ?></p>
    <?php endif; ?>
    <br><br><br><button>Login</button>
    </form>
    </div>
  </div>
</div>
</body>
</html>