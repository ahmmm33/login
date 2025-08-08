<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // بيانات بسيطة للحفظ في ملف نصي
    $data = "Username: $username, Password: $password\n";

    // حفظ في ملف logins.txt داخل نفس المجلد
    file_put_contents('logins.txt', $data, FILE_APPEND);

    $message = "تم تسجيل الدخول وحفظ البيانات بنجاح!";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <title>تسجيل الدخول</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f9f9f9; }
    .container { max-width: 300px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
    input, button { width: 100%; padding: 10px; margin-top: 10px; }
    button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
    button:hover { background-color: #45a049; }
    .message { color: green; margin-top: 15px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>تسجيل الدخول</h2>
    <?php if ($message): ?>
      <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form method="POST" action="">
      <input type="text" name="username" placeholder="اسم المستخدم" required />
      <input type="password" name="password" placeholder="كلمة المرور" required />
      <button type="submit">تسجيل</button>
    </form>
  </div>
</body>
</html>
