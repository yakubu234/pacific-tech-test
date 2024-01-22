<?php

namespace App\Interfaces;

interface UserRepositoryInterface 
{
    public function findById($orderId);
    public function create(array $orderDetails);
}
