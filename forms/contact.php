<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Only if installed via Composer

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);
    
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change for Outlook/Yahoo
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Change this
        $mail->Password = 'your-app-password'; // Use App Password, NOT regular password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email details
        $mail->setFrom('your-email@gmail.com', 'Your Name');
        $mail->addAddress('23bcs019@kprcas.ac.in'); // Change this

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        if ($mail->send()) {
            echo "Success: Email sent!";
        } else {
            echo "Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    echo "Error: Invalid request!";
}
?>
