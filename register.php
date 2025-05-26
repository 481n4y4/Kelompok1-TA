<?php
$conn = new mysqli("localhost", "root", "", "user_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        $error = "Username sudah digunakan.";
    } else {
        $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        header("Location: login.php");
        exit();
    }
}
?>

<link rel="stylesheet" href="./css/register.css">

<body>
  <div class="container">
    <div class="left-box">
      <div class="logo">Tech Com</div>
      <h1>Hello,<br>register now!</h1>
    </div>
    <div class="right-box">
      <form method="post">
          <h2 style="color: white;">Register</h2>
          <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Register</button>
        <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
      </form>
    </div>
  </div>
</body>