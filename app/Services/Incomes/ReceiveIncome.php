<?php

namespace App\Services\Incomes;

use App\Models\Incomes;

class ReceiveIncome
{
    public function execute(int $id)
    {
        try {
            $income = Incomes::find($id);
            $income->paid ? $income->paid = false : $income->paid = true;
            $income->save();

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
