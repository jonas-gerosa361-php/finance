<?php

namespace App\Services\Incomes;

use App\Exceptions\ValidatorException;
use App\Helpers\Utils;
use App\Models\Incomes;

class UpdateIncome
{
    public function execute(array $args): string
    {
        try {
            $income = Incomes::find($args['id']);

            $requiredFields = [
                'name',
                'value',
                'date'
            ];
            Utils::validateArgs($args, $requiredFields);

            $income->name = $args['name'];
            $income->date = $args['date'];
            $income->value = $args['value'];
            empty($args['description']) && $income->description = $args['description'];

            $income->save();

            return json_encode([
                'success' => true,
                'message' => 'Dados alterados'
            ]);
        } catch (ValidatorException $e) {
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        } catch (\Throwable $th) {
            report($th);
            return json_encode([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
