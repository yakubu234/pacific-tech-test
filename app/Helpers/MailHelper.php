<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Mail;

class MailHelper{

    const SUBJECT = 'Confirm Your Email';
    function sendConfirmationEmail($user, $token)
    {
        try {
            $baseUrl = url('/verify.email');
            Mail::send('emails.confirmation', ['user' => $user, 'token' => $baseUrl.'/'.$token, 'subject' => self::SUBJECT], function ($message) use ($user) {
                $message->to($user->email)->subject(self::SUBJECT);
            });
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            throw new Exception($th->getMessage());
        }
        
    }
}