<?php

namespace App\Services\Categories;

use App\Exceptions\ValidatorException;
use App\Helpers\Utils;
use App\Models\Categories;

class UpdateCategory
{
    public function execute(array $args)
    {
        try {
            Utils::validateArgs($args, ['id', 'name']);

            $category = Categories::find($args['id']);
            $category->name = $args['name'];
            $category->save();

            return json_encode([
                'success' => true,
                'message' => 'Categoria alterada com sucesso'
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
