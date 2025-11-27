<?php

namespace App\Services;

use App\Models\Account;

class AccountService
{
    public function __construct(
        private readonly Account $accountModel
    ) {
    }

    public function getAccounts()
    {
        return $this->accountModel->getAccounts();
    }

    public function getAccount($id)
    {
        return $this->accountModel->getAccount($id);
    }

    public function createAccount($data)
    {
        return $this->accountModel->createAccount($data);
    }

    public function updateAccount($id, $data)
    {
        return $this->accountModel->updateAccount($id, $data);
    }

    public function deleteAccount($id)
    {
        return $this->accountModel->deleteAccount($id);
    }
}
