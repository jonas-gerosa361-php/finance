<?php

namespace App\Services\Accounts;

use App\Exceptions\ValidatorException;
use App\Helpers\Utils;
use App\Models\Accounts;

class StoreAccount
{
    public function execute(array $args): array
    {
        try {
            $requiredFields = [
                'name',
                'balance'
            ];
            Utils::validateArgs($args, $requiredFields);

            Accounts::create([
                'name' => $args['name'],
                'balance' => $args['balance']
            ]);

            return [
                'success' => true,
                'message' => 'Conta cadastrada com sucesso'
            ];
        } catch (ValidatorException $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
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
