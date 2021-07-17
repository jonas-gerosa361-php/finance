<?php

namespace App\Services\Bills;

use App\Exceptions\ValidatorException;
use App\Helpers\Utils;
use App\Models\Bills;

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

            if ($args['repeat-n-times'] > 0) {
                $fullDate = explode('-', $args['due_date']);
                $year = $fullDate[0];
                $month = $fullDate[1];
                $day = $fullDate[2];
                $repetedFor = 1;
                
                Bills::create([
                        'name' => $args['name'],
                        'due_date' => $args['due_date'],
                        'value' => str_replace(',', '.', $args['value']),
                        'repeatFor' => !empty($args['repeat']) ? $args['repeat-n-times'] : null,
                        'categories_id' => $args['category'],
                        'credit_card' => $args['credit_card'],
                        'repeatedFor' => $repetedFor
                ]);
                $repetedFor++;

                for ($i=1; $i < $args['repeat-n-times']; $i++) {
                    if ($month < 12) {
                        $month = str_pad($month + 1, 2, '0', STR_PAD_LEFT);
                    } else {
                        $month = '01';
                        $year = (string) $year + 1;
                    }
                        
                    $newDate = "{$year}-{$month}-{$day}";
                    
                    Bills::create([
                        'name' => $args['name'],
                        'due_date' => $newDate,
                        'value' => str_replace(',', '.', $args['value']),
                        'repeatFor' => !empty($args['repeat']) ? $args['repeat-n-times'] : null,
                        'categories_id' => $args['category'],
                        'credit_card' => $args['credit_card'],
                        'repeatedFor' => $repetedFor
                    ]);

                    $repetedFor++;
                }
            } else {
                Bills::create([
                    'name' => $args['name'],
                    'due_date' => $args['due_date'],
                    'value' => str_replace(',', '.', $args['value']),
                    'repeatFor' => empty($args['repeat']) ? null : $args['repeat-n-times'],
                    'repeatedFor' => empty($args['repeat']) ? null: 1,
                    'categories_id' => $args['category'],
                    'credit_card' => $args['credit_card']
                ]);
            }

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
