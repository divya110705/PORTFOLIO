use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your-email@gmail.com';
$mail->Password = 'your-app-password'; 
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('your-email@gmail.com', 'Your Name');
$mail->addAddress('23bcs019@kprcas.ac.in');

$mail->isHTML(false);
$mail->Subject = $subject;
$mail->Body = $body;

if ($mail->send()) {
    echo "Success";
} else {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
