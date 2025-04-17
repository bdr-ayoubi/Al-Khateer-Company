<?php
// بداية index.php في مجلد admin
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}

$host = 'localhost';
$db = 'alkhater_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM requests ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>لوحة الإدارة - الطلبات</title>
  <style>
    body { font-family: 'Cairo', sans-serif; direction: rtl; background: #f5f5f5; padding: 30px; }
    table { width: 100%; border-collapse: collapse; background: #fff; }
    th, td { padding: 12px; border: 1px solid #ddd; }
    th { background: #222; color: white; }
    h1 { margin-bottom: 20px; }
  </style>
</head>
<body>
  <h1>لوحة الإدارة - الطلبات الواردة</h1>
  <table>
    <tr>
      <th>الاسم</th>
      <th>البريد</th>
      <th>الموضوع</th>
      <th>الرسالة</th>
      <th>تاريخ الإرسال</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['subject']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td><?= $row['submitted_at'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
