<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $mail = new PHPMailer(true);

        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'marcelnoumsi8@gmail.com';
            $mail->Password   = 'introuvable145';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('marcelnoumsi8@gmail.com', 'Name');
            $mail->addAddress('mikatchonko@gmail.com');
            $mail->addReplyTo($request->email, $request->name);

            $mail->isHTML(true);
            $mail->Subject = "Contact Form Submission from: " . $request->name;
            $mail->Body    = "<h3>Name : " . $request->name . "</h3><br>
                              <h3>Email : " . $request->email . "</h3><br>
                              <h3>Phone : " . $request->phone . "</h3><br>
                              <h3>Message : " . $request->message . "</h3><br>";

            $mail->send();
            return 'success';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
