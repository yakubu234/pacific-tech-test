<?php

namespace App\Http\Controllers;

use App\Interfaces\EmailVerificationRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserRepositoryInterface $userRepository;
    protected EmailVerificationRepositoryInterface $emailVerificationRepository;

    public function __construct(UserRepositoryInterface $userRepository, EmailVerificationRepositoryInterface $emailVerificationRepository)
    {
        $this->userRepository = $userRepository;
        $this->emailVerificationRepository = $emailVerificationRepository;
    }
    

    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $user = $this->userRepository->create($request->all());

        # Upload profile picture
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $path = $profilePicture->storeAs('profile_pictures', $user->id . '.' . $profilePicture->getClientOriginalExtension());
            $user->update(['profile_picture' => $path]);
        }

        # send email notification
        $this->emailVerificationRepository->create($user);
        return redirect()->route('registration.success');
    }

    public function registrationSuccessful()
    {
        return view('registration_success');
    }
}
