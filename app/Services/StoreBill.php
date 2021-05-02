<?php

namespace App\Services;

use App\Models\Bills;

class StoreBill
{
    public function execute($args)
    {
        try {
            $this->validate($args);
            Bills::create([
                'name' => $args['name'],
                'due-date' => $args['due-date'],
                'value' => $args['value'],
                'repeatFor' => $args['repeat'] === 'on' ? $args['repeat-n-times'] : null,
            ]);
            return json_encode([
                'success' => true,
                'message' => 'Conta inserida com sucesso',
                'args' => $args
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
        //TODO: Create validation
    }
}
