<?php

namespace App\Interfaces;

use App\Models\User;
use App\Models\VerificationToken;

interface EmailVerificationRepositoryInterface 
{
    public function create(User $orderDetails);
}