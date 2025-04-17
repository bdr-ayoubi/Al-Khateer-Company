<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$mail = new PHPMailer(true);

try {
  // إعدادات السيرفر
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'bdrmatt@gmail.com'; // بريدك
  $mail->Password = 'bedo9394'; // كلمة مرور التطبيقات الخاصة بجوجل
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  // المرسل والمستلم
  $mail->setFrom('bdrmatt@gmail.com', 'موقع شركة الخاطر');
  $mail->addAddress('bdrmatt@gmail.com'); // بريدك الذي تريد استلام الطلبات عليه

  // المحتوى
  $mail->isHTML(true);
  $mail->Subject = 'طلب جديد من الموقع';
  $mail->Body = "
    <strong>الاسم:</strong> " . $_POST['name'] . "<br>
    <strong>البريد:</strong> " . $_POST['email'] . "<br>
    <strong>الموضوع:</strong> " . $_POST['subject'] . "<br>
    <strong>الرسالة:</strong><br>" . nl2br($_POST['message']);

  $mail->send();
  echo '✅ تم الإرسال بنجاح!';
} catch (Exception $e) {
  echo '❌ حدث خطأ أثناء الإرسال: ', $mail->ErrorInfo;
}
