<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // بيانات الدخول (غيّرها كما تشاء)
  $valid_username = 'admin';
  $valid_password = '123456';

  if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['admin'] = true;
    header("Location: index.php");
    exit();
  } else {
    $error = "❌ اسم المستخدم أو كلمة المرور غير صحيحة.";
  }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>تسجيل دخول الإدارة</title>
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background-color: #f1f1f1;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      direction: rtl;
    }
    form {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px #ccc;
      width: 300px;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
    }
    .error { color: red; text-align: center; }
  </style>
</head>
<body>

<form method="post">
  <h2 style="text-align:center;">تسجيل الدخول</h2>
  <input type="text" name="username" placeholder="اسم المستخدم" required>
  <input type="password" name="password" placeholder="كلمة المرور" required>
  <button type="submit">دخول</button>
  <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<a href="logout.php" style="color:red;">تسجيل الخروج</a>

</body>
</html>
