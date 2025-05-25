<?php
session_start();
$conn = new mysqli("localhost", "root", "", "user_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $_POST["password"];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Akun tidak ditemukan.";
    }
}
?>

<link rel="stylesheet" href="css/register.css">

<body>
  <div class="container">
    <!-- Bagian kiri -->
    <div class="left-box">
      <div class="logo">Tech Com</div>
      <h1>Hello,<br>welcome!</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nisi risus.</p>
    </div>

    <!-- Bagian kanan -->
    <div class="right-box">
      <form action="login_process.php" method="POST">
        <input type="email" name="email" placeholder="Email address" required />
        <input type="password" name="password" placeholder="Password" required />

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
          <label style="font-size: 14px; color: white">
            <input type="checkbox" name="remember" /> Remember me
          </label>
          <a href="#" style="font-size: 14px; color: #2f5bea; text-decoration: none;">Forgot password?</a>
        </div>

        <button type="submit" class="btn">Login</button>
        <p class="login-link">Don't have an account? <a href="register.php">Sign up here</a></p>
      </form>
    </div>
  </div>
</body>