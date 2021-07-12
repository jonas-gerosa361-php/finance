<?php

namespace App\Services\Bills;

use App\Exceptions\ValidatorException;
use App\Helpers\Utils;
use App\Models\Accounts;
use App\Models\Bills;

class PayBill
{
    public function execute(array $args)
    {
        try {
            $requiredFields = [
                'account',
                'pay_date',
            ];
            Utils::validateArgs($args, $requiredFields);

            $account = Accounts::find($args['account']);
            $bill = Bills::find($args['bill']);
            
            if ($bill->paid) {
                $bill->paid = false;
                $account->balance += $bill->value;
                $bill->pay_date = null;
                $bill->status = null;
            } else {
                $bill->paid = true;
                $account->balance -= $bill->value;
                $bill->pay_date = $args['pay_date'];
                $bill->status = 'Pago';
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
        } catch (ValidatorException $e) {
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            report($e);
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
