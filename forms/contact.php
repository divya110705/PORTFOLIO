<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // If using Composer
// OR require files manually if downloaded
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = '23bcs019@kprcas.ac.in'; // Your Gmail address
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('email@gmail.com', 'Your Name'); // Sender
    $mail->addAddress('23bcs019@kprcas.ac.in'); // Recipient

    $mail->Subject = 'Contact Form Message';
    $mail->Body = 'This is a test email sent using PHPMailer!';
    
    $mail->send();
    echo '✅ Email sent successfully!';
} catch (Exception $e) {
    echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
