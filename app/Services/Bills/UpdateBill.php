<?php

namespace App\Services\Bills;

use App\Helpers\Utils;
use App\Models\Bills;

class UpdateBill
{
    public function execute($args): string
    {
        try {
            $bill = Bills::find($args['id']);
            $requiredFields = [
                'name',
                'due_date',
                'value'
            ];
            Utils::validateArgs($args, $requiredFields);
            
            $args['repeat-n-times'] = $args['repeat-n-times'] || false;
            empty($args['name']) || $bill->name = $args['name'];
            empty($args['due_date']) || $bill->due_date = $args['due_date'];
            empty($args['credit_card']) || $bill->credit_card = $args['credit_card'];
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
