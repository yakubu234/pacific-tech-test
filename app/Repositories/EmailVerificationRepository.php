<?php

namespace App\Repositories;

use App\Interfaces\EmailVerificationRepositoryInterface;
use App\Models\User;
use Str;
use App\Models\VerificationToken;


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
        return $this->model->create([
            'user_id' => $user->id,
            'token' => Str::random(60),
            'expires_at' => now()->addDays(7), // Example expiration time
        ]);
    }

}
