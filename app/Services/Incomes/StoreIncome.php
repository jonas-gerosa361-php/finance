<?php

namespace App\Services\Incomes;

use App\Exceptions\ValidatorException;
use App\Helpers\Utils;
use App\Models\Incomes;

class StoreIncome
{
    public function execute($args)
    {
        try {
            $requiredFields = [
                'name',
                'date',
                'value',
                'account'
            ];
            Utils::validateArgs($args, $requiredFields);

            Incomes::create([
                'name' => $args['name'],
                'date' => $args['date'],
                'description' => $args['description'],
                'value' => str_replace(',', '.', $args['value']),
                'account_id' => $args['account']
            ]);
            return json_encode([
                'success' => true,
                'message' => 'Receita cadastrada com sucesso',
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
                'message' => 'Erro inesperado',
            ]);
        }
    }
}
