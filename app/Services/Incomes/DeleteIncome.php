<?php

namespace App\Services\Incomes;

use App\Models\Incomes;

class DeleteIncome
{
    public function execute(int $id): string
    {
        try {
            $income = Incomes::find($id);
            $income->delete();
            
            return json_encode([
                'success' => true,
                'message' => 'Receita deletada com sucesso'
            ]);
        } catch (\Throwable $th) {
            report($th);
            return json_encode([
                'success' => false,
                'message' => 'Erro inesperado'
            ]);
        }
    }
}
