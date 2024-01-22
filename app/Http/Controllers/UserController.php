<?php

namespace App\Http\Controllers;

use App\Helpers\MailHelper;
use App\Http\Requests\RegisterationRequest;
use App\Interfaces\EmailVerificationRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserRepositoryInterface $userRepository;
    protected EmailVerificationRepositoryInterface $emailVerificationRepository;
    protected $emailHelper;

    public function __construct(UserRepositoryInterface $userRepository, EmailVerificationRepositoryInterface $emailVerificationRepository,MailHelper $emailHelper)
    {
        $this->userRepository = $userRepository;
        $this->emailVerificationRepository = $emailVerificationRepository;
        $this->emailHelper = $emailHelper;
    }
    

    public function index()
    {
        return view('register');
    }

    public function register(RegisterationRequest $request)
    {
        $user = $this->userRepository->create($request->all());

        # Upload profile picture
        if ($request->hasFile('profile_picture') && $user) {
            try {
                $profilePicture = $request->file('profile_picture');
                $path = $profilePicture->storeAs('profile_pictures', $user->id . '.' . $profilePicture->getClientOriginalExtension());
                $user->update(['profile_picture' => $path]);
            } catch (\Throwable $th) {
                Log::info(json_encode($th->getMessage())); # log the error
            }
        }

        # send email notification
        $verificationToken = $this->emailVerificationRepository->create($user);
        if($this->emailHelper->sendConfirmationEmail($user, $verificationToken->token)){
            return redirect()->route('registration.success')->with('success_message', 'Registration Successful, Check your email for activation link');
        }
        
        return redirect()->route('error')->with('error_message', 'Error sending email');
    }

    public function registrationSuccessful()
    {
        return view('registration_success');
    }

    public function displayError()
    {
        return view('error');
    }
}
