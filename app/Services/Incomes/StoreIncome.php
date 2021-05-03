<?php

namespace App\Services\Incomes;

use App\Models\Incomes;

class StoreIncome
{
    public function execute($args)
    {
        try {
            $this->validate($args);
            Incomes::create([
                'name' => $args['name'],
                'date' => $args['date'],
                'description' => $args['description'],
                'value' => $args['value']
            ]);
            return json_encode([
                'success' => true,
                'message' => 'Receita cadastrada com sucesso',
            ]);
        } catch (\Exception $e) {
            report($e);
            return json_encode([
                'success' => false,
                'message' => 'Erro inesperado'
            ]);
        }
    }

    private function validate($args)
    {
        //TODO: create validation
    }
}
