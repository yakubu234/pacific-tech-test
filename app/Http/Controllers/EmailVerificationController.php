<?php

namespace App\Http\Controllers;

use App\Helpers\MailHelper;
use App\Interfaces\EmailVerificationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailVerificationController extends Controller
{
    protected EmailVerificationRepositoryInterface $emailVerificationRepository;
    protected $emailHelper;

    public function __construct(EmailVerificationRepositoryInterface $emailVerificationRepository,MailHelper $emailHelper)
    {
        $this->emailVerificationRepository = $emailVerificationRepository;
        $this->emailHelper = $emailHelper;
    }

    public function verify(Request $request, $token)
    {
        $verification = $this->emailVerificationRepository->findByToken($token);

        if ($verification && $this->emailVerificationRepository->isValid($verification)) {
            
            try {
                $this->emailVerificationRepository->markVerified($verification);
                return redirect()->route('registration.success')->with('success_message', 'Email has been confirmed');
            } catch (\Throwable $th) {
                Log::info(json_encode($th->getMessage())); # log the error
                return redirect()->route('error')->with('error_message', $th->getMessage());
            }
            
        } 
        
        return redirect()->route('error')->with('error_message', 'Error : Invalid Token');
        
    }
}
