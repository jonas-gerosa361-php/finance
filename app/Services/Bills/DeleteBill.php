<?php

namespace App\Services\Bills;

use App\Models\Bills;

class DeleteBill
{
    public function execute(int $id): string
    {
        try {
            $bill = Bills::find($id);
            
            if ($bill->paid) {
                return json_encode([
                    'success' => false,
                    'message' => 'Não é possível deletar uma conta paga'
                ]);
            }
            
            $bill->delete();
            return json_encode([
                'success' => true,
                'message' => 'Conta deletada'
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
