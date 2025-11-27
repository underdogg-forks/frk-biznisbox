<?php

namespace App\Services;

use App\Models\OnlinePayment;

class PaymentService
{
    public function __construct(
        private readonly OnlinePayment $onlinePayment
    ) {
    }

    public function getPayments()
    {
        return $this->onlinePayment->all();
    }

    public function getPayment($id)
    {
        return $this->onlinePayment->find($id);
    }
}
