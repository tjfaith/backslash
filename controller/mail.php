<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions

class php_mail{

public function email($data){

$mail = new PHPMailer(true);


            //Server settings
        //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'mail.tectainet.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'mailer@tectainet.com';                     // SMTP username
            $mail->Password   = 'faithproxx22';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->SMTPSecure = 'ssl';

            //Recipients
            $mail->setFrom($data['email'], $data['fullName']);
            $mail->addReplyTo($data['email']);
            $mail->addAddress('info@eduplus.sch.ng', 'EDUPLUS');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('./'.$data[0]['details'].'.xlsx');         // Add attachments
            // $mail->addAttachment('./img/LOGO.05fb23f9.png', 'LOGO.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'EDUPLUS CONTACT';
            $mail->Body    = 'Hello! here is a message from '. $data['fullName'] . ', <br>
            
            <p>'
            .$data['message']
            .'
            </p>
            
            ';
        try {
            $mail->send();
            echo json_encode(array("returnMsg" => "Message has been sent"));
        //     echo 'Message has been sent';
            } catch (Exception $e) {
                echo json_encode(array("returnMsg" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"));
            }

           
        }

}

?>