<?php

namespace App\Services\Incomes;

use App\Models\Accounts;
use App\Models\Incomes;

class ReceiveIncome
{
    public function execute(int $id)
    {
        try {
            $income = Incomes::find($id);
            $income->paid ? $income->paid = false : $income->paid = true;
            
            $account = Accounts::find($income->account_id);
            $income->paid ? $account->balance += $income->value : $account->balance -= $income->value;
            
            $income->save();
            $account->save();

            return json_encode([
                'success' => true,
                'message' => 'Ação realizada',
            ]);
        } catch (\Exception $e) {
            report($e);
            return json_encode([
                'success' => false,
                'message' => 'Erro inesperado'
            ]);
        }
    }
}
