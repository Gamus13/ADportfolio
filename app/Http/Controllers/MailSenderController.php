<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailSenderController extends Controller
{
    // public function sendEmail(Request $request)
    // {
    //     $mail = new PHPMailer(true);

    //     try {
    //         // Configuration du serveur SMTP de Gmail
    //         $mail->isSMTP();
    //         $mail->Host       = 'smtp.gmail.com';
    //         $mail->SMTPAuth   = true;
    //         $mail->Username   = 'marcelnoumsi8@gmail.com';
    //         $mail->Password   = 'hcthqhjwosryjfio';
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //         $mail->Port       = 587;

    //         // Adresse expéditeur (utilisée pour l'authentification SMTP)
    //         $mail->setFrom($request->email, $request->name);

    //         // Adresse destinataire
    //         $mail->addAddress('marcelnoumsi8@gmail.com');

    //         // Adresse de réponse
    //         $mail->addReplyTo($request->email, $request->name);

    //         // Contenu de l'e-mail
    //         $mail->isHTML(true);
    //         $mail->Subject = "Formulaire de soumission de: " . $request->noms;
    //         $mail->Body    = "<h3>Noms : " . $request->noms . "</h3><br>
    //                         <h3>Email : " . $request->email . "</h3><br>
    //                         <h3>Telephone : " . $request->telephone . "</h3><br>
    //                         <h3>Message : " . $request->message . "</h3><br>";

    //         $mail->send();
    //         return 'success';
    //     } catch (Exception $e) {
    //         return "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
    //     }
    // }
    public function sendEmail(Request $request)
    {
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP de Gmail
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'marcelnoumsi8@gmail.com';
            $mail->Password   = 'hcthqhjwosryjfio';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Adresse expéditeur (utilisée pour l'authentification SMTP)
            $mail->setFrom($request->email, $request->name);

            // Adresse destinataire
            $mail->addAddress('marcelnoumsi8@gmail.com');

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = "Formulaire de soumission de : " . $request->noms;
            $mail->Body    = "<h3>Noms : " . $request->noms . "</h3><br>
                            <h3>Email : " . $request->email . "</h3><br>
                            <h3>Téléphone : " . $request->telephone . "</h3><br>
                            <h3>Message : " . $request->message . "</h3><br>";

            // Envoyer l'e-mail au destinataire principal
            $mail->send();

            // Envoyer l'e-mail de confirmation à l'adresse insérée
            $mail->clearAddresses();
            $mail->addAddress($request->email);
            $mail->Subject = "Confirmation de réception de votre message";
            $mail->Body    = "Cher " . $request->noms . ",<br><br>
                            Nous vous remercions d'avoir pris le temps de nous contacter. Cet e-mail est pour vous confirmer que nous avons bien reçu votre message. Nous accordons une grande importance à votre demande et nous mettrons tout en œuvre pour y répondre dans les plus brefs délais.<br><br>
                            Veuillez noter que nous traitons un grand nombre de demandes quotidiennement, mais soyez assuré que nous examinons attentivement chaque message que nous recevons. Votre satisfaction est notre priorité absolue, et nous nous efforçons de vous fournir une réponse complète et précise.<br><br>
                            Si vous avez des informations supplémentaires ou des détails à ajouter, n'hésitez pas à nous les communiquer. Cela nous aidera à mieux comprendre votre demande et à vous fournir une assistance adaptée.<br><br>
                            Nous vous remercions encore une fois de nous avoir contactés et nous vous assurons que nous mettons tout en œuvre pour vous apporter une réponse dans les brefs délais.<br><br>
                            Cordialement,<br>
                            [noumsi guy junor / AFRO_DEV]";

            $mail->send();

            return 'success';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
