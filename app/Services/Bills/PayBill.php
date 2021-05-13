<?php

namespace App\Services\Bills;

use App\Models\Bills;

class PayBill
{
    public function execute(int $id)
    {
        try {
            $bill = Bills::find($id);
            $bill->paid ? $bill->paid = false : $bill->paid = true;
            
            if ($bill->repeatFor !== null && $bill->paid === true) {
                $bill->repeatedFor = $bill->repeatedFor + 1;
            }

            if ($bill->repeatFor !== null && $bill->paid === false) {
                $bill->repeatedFor = $bill->repeatedFor - 1;
            }
            $bill->save();

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
