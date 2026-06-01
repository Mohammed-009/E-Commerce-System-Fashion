<?php

namespace App\Http\Controllers;

// use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller
{
    //
    public function sendEmail(Request $request)
    {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            // VERY IMPORTANT for localhost
            $mail->SMTPOptions = [
                'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
                ],
            ];

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->email);

            $mail->isHTML(true);
            $mail->Subject = $request->subject;
            $mail->Body    = $request->body;

            if (!$mail->send()) {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {
                return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent. Mailer Error: '.$e->getMessage());
        }



        // $mail = new PHPMailer(true);
   
        // try {
   
        //     /* Email SMTP Settings */
        //     $mail->SMTPDebug = 0;
        //     $mail->isSMTP();
        //     $mail->Host = env('MAIL_HOST');
        //     $mail->SMTPAuth = true;
        //     $mail->Username = env('MAIL_USERNAME');
        //     $mail->Password = env('MAIL_PASSWORD');
        //     $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        //     $mail->Port = env('MAIL_PORT');
   
        //     $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        //     $mail->addAddress($request->email);
   
        //     $mail->isHTML(true);
   
        //     $mail->Subject = $request->subject;
        //     $mail->Body    = $request->body;
   
        //     if( !$mail->send() ) {
        //         return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
        //     }
              
        //     else {
        //         return back()->with("success", "Email has been sent.");
        //     }

        // }catch (Exception $e) {
        //         return back()->with('error', 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo);
        //     }
            
   
        // } catch (Exception $e) {
        //      return back()->with('error','Message could not be sent.');
        // }
    }
}
