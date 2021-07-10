<?php

namespace App\Services\Bills;

use App\Models\Accounts;
use App\Models\Bills;

class PayBill
{
    public function execute(array $args)
    {
        try {
            $account = Accounts::find($args['account']);
            $bill = Bills::find($args['bill']);
            
            if ($bill->paid) {
                $bill->paid = false;
                $account->balance += $bill->value;
            } else {
                $bill->paid = true;
                $account->balance -= $bill->value;
            }

            
            if ($bill->repeatFor !== null && $bill->paid === true) {
                $bill->repeatedFor = $bill->repeatedFor + 1;
            }

            if ($bill->repeatFor !== null && $bill->paid === false) {
                $bill->repeatedFor = $bill->repeatedFor - 1;
            }
            $bill->save();
            $account->save();

            return json_encode([
                'success' => true,
                'message' => 'Ação realizada com sucesso'
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
