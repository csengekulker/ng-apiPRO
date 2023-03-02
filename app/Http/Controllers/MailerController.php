<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends BaseController
{
    public function composeEmail(Request $request, $id) {
        require base_path('vendor/autoload.php');

        $message = Message::find($id);

        try {
            $mail = new PHPMailer(true);

            // Email server settings
    
            $mail->SMTPDebug = 4;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'k71608883429@ktch.hu'; 
            $mail->Password = 'rgvbtvrkzjdccolq'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587; // 587 or 465
    
            $mail->setFrom($mail->Username); 
            $mail->addAddress($message->email);
    
            $mail->isHTML(true);
    
            $mail->Subject = $request->subject;
            $mail->Body = $request->body;

            if(!$mail->send()) {
                return $this->sendError($mail->ErrorInfo, "Hiba a valaszkuldes soran.");
            } else {
                return $this->sendResponse($mail, 'Sikeres valasz.');
            }

        } catch (Exception $e) {
            return back()->with('error', 'Nem tudtam elkuldeni.');
        }

    }
}
