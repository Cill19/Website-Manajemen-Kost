<?php

namespace App\Repositories;

use App\Interface\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getTransactionDataFromSession()
    {
        return session()->get('transaction');
    }

    public function saveTransactionDataToSession($data)

    {
        $transaction = session()-> get('transaction', []);

        foreach($data as $key => $value)
        {
            $transaction[$key] = $value;
        }

        session()->put('transaction', $transaction);
    }
}