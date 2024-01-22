<?php

namespace App\Interfaces;

use App\Models\User;
use App\Models\VerificationToken;

interface EmailVerificationRepositoryInterface 
{
    public function create(User $orderDetails);
    public function isValid(VerificationToken $emailData);
    public function markVerified(VerificationToken $verification);
    public function findByToken(string $token);
}