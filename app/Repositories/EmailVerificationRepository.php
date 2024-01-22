<?php

namespace App\Repositories;

use App\Interfaces\EmailVerificationRepositoryInterface;
use App\Models\User;
use Str;
use App\Models\VerificationToken;
use Carbon\Carbon;

/**
 * Class EmailVerification.
 */
class EmailVerificationRepository implements EmailVerificationRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function __construct(VerificationToken $verificationToken)
    {
        $this->model = $verificationToken;
    }

    public function create(User $user)
    {
        $token = $this->generateUniqueToken();
        return $this->model->create([
            'user_id' => $user->id,
            'token' => $token,
            'expires_at' => now()->addDays(7), # max expiration time
        ]);
    }

    public function generateUniqueToken(): string
    {
        # Loop until a unique token is found
        while (true) {
            $token = Str::random(60);
            if (!$this->model->where('token', $token)->exists()) {
                return $token;
            }
        }
    }

    public function findByToken(string $token)
    {
        return $this->model->where('token', $token)->first();
    }

    public function isValid(VerificationToken $verification)
    {
         $verification->expires_at = Carbon::now();
         $verification->save();
         return $verification;
    }

    public function markVerified(VerificationToken $verification)
    {
        $verification->load('user');
        $verification->user->email_verified_at = Carbon::now();
        $verification->user->save();
    }
}
