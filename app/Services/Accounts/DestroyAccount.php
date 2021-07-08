<?php

namespace App\Services\Accounts;

use App\Models\Accounts;

class DestroyAccount
{
    public function execute(int $id): array
    {
        try {
            Accounts::find($id)->delete();
            return [
                'success' => true,
                'message' => 'Conta exclúida com sucesso'
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'success' => false,
                'message' => 'Erro inesperado'
            ];
        }
    }
}
