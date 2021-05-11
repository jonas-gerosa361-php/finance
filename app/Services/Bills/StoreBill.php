<?php

namespace App\Services\Bills;

use App\Models\Bills;
use App\Exceptions\ValidatorException;

class StoreBill
{
    public function execute($args)
    {
        try {
            $this->validate($args);
            Bills::create([
                'name' => $args['name'],
                'due_date' => $args['due_date'],
                'value' => $args['value'],
                'repeatFor' => !empty($args['repeat']) ? $args['repeat-n-times'] : null,
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
                'message' => $e->getMessage()
            ]);
        }
    }

    private function validate($args)
    {
        //TODO: Create validation
    }
}
