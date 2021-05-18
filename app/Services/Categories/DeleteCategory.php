<?php

namespace App\Services\Categories;

use App\Models\Bills;
use App\Models\Categories;
use App\Services\Bills\DeleteBill;

class DeleteCategory
{
    public function execute(int $id)
    {
        try {
            $bills = Bills::where('categories_id', $id)->get();
            $this->deleteBills($bills);

            $category = Categories::find($id);
            $category->delete();

            return json_encode([
                'success' => true,
                'message' => 'Categoria e contas desta categoria deletas com sucesso'
            ]);
        } catch (\Throwable $th) {
            report($th);
            return json_encode([
                'success' => false,
                'message' => 'Falha ao deletar categoria'
            ]);
        }
    }

    private function deleteBills($bills): void
    {
        if (!empty($bills)) {
            $action = new DeleteBill();
            foreach ($bills as $bill) {
                $action->execute($bill->id);
            }
        }
    }
}
