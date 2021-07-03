<?php

namespace App\Services\Categories;

use App\Exceptions\ValidatorException;
use App\Helpers\Utils;
use App\Models\Categories;

class StoreCategory
{
    public function execute(array $args)
    {
        try {
            $requiredFields = [
                'name'
            ];
            Utils::validateArgs($args, $requiredFields);

            Categories::create([
                'name' => $args['name']
            ]);

            return json_encode([
                'success' => true,
                'message' => 'Categoria cadastrada'
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
                'message' => 'Erro inesperado'
            ]);
        }
    }
}
