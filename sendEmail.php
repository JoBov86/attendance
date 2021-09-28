<?php
// require "vendor/autoload.php";

// class SendEmail {
//     public static function sendMail($to, $subject, $content) {
//         $key = "API KEY (from app.sendgrid.com)";
//         $email = new \SendGrid\Mail\Mail();
//         $email->setFrom("email address of company/conference", "Mr Whoever");
//         $email->setSubject($subject);
//         $email->addTo($to);
//         $email->addContent("text/plain", $content);
//         // or $email->addContent("text/html", $content);
    
//         $sendgrid = new \SendGrid($key);

//         try {
//             $response = $sendgrid->send($email);
//             return $response;
//         } catch(Exception $e) {
//             echo "Email Exception caught: ". $e->getMessage(). "\n";
//             return false;

//         }
//     }
// }
?>