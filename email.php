<?php
// إعدادات البريد
$to = 'bdrmatt@gmail.com'; // غيّر إلى بريدك
$subject_email = "طلب جديد من موقع الخاطر للهندسة";
$message_email = "
طلب جديد تم استلامه:

الاسم: $name
البريد: $email
الموضوع: $subject
الرسالة: $message
";

$headers = "From: website@alkhater.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// إرسال البريد
mail($to, $subject_email, $message_email, $headers);
?>