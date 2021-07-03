<?php

namespace App\Services\Bills;

use App\Models\Bills;
use App\Helpers\Utils;

class UpdateBill
{
    public function execute($args): string
    {
        try {
            $bill = Bills::find($args['id']);
            $args['repeat-n-times'] = $args['repeat-n-times'] || false;
            Utils::validateArgs($args, array_keys($args));

            empty($args['name']) || $bill->name = $args['name'];
            empty($args['due_date']) || $bill->due_date = $args['due_date'];
            empty($args['value']) || $bill->value = str_replace(',', '.', $args['value']);
            $args['repeat-n-times'] !== false || $bill->repeatFor = $args['repeat-n-times'];

            $bill->save();

            return json_encode([
                'success' => true,
                'message' => 'Dados alterado'
            ]);
        } catch (\Exception $e) {
            report($e);
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
