<?php
session_start();
$conn = new mysqli("localhost", "root", "", "kelompok1-ta");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $_POST["password"];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Akun tidak ditemukan.";
    }
}
?>

<link rel="stylesheet" href="./css/register.css">

<body>
  <div class="container">
    <!-- Bagian kiri -->
    <div class="left-box">
      <div class="logo">Tech Com</div>
      <h1>Hello,<br>welcome!</h1>
    </div>

    <!-- Bagian kanan -->
    <div class="right-box">
      <form method="post">
        <h2 style="color: white;">Login</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
        <p class="login-link">Don't have an account? <a href="register.php">Sign up here</a></p>
      </form>
    </div>
  </div>
</body>