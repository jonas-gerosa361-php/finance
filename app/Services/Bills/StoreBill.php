<?php

namespace App\Services\Bills;

use App\Models\Bills;
use App\Exceptions\ValidatorException;
use App\Helpers\Utils;

class StoreBill
{
    public function execute($args)
    {
        try {
            $requiredFields = [
                'name',
                'due_date',
                'value',
                'category'
            ];
            Utils::validateArgs($args, $requiredFields);
            
            Bills::create([
                'name' => $args['name'],
                'due_date' => $args['due_date'],
                'value' => str_replace(',', '.', $args['value']),
                'repeatFor' => !empty($args['repeat']) ? $args['repeat-n-times'] : null,
                'categories_id' => $args['category']
            ]);
            
            return json_encode([
                'success' => true,
                'message' => 'Conta inserida com sucesso'
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
                'message' => $e->getMessage(),
            ]);
        }
    }
}
