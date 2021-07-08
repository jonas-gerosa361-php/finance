<?php

namespace App\Services\Accounts;

use App\Exceptions\ValidatorException;
use App\Helpers\Utils;
use App\Models\Accounts;

class UpdateAccount
{
    public function execute(array $args)
    {
        try {
            $requiredFields = [
                'id',
                'name',
                'balance'
            ];
            Utils::validateArgs($args, $requiredFields);
            $account = Accounts::find($args['id']);
            $account->name = $args['name'];
            $account->balance = $args['balance'];
            $account->save();

            return [
                'success' => true,
                'message' => 'Conta alterada com sucesso'
            ];
        } catch (ValidatorException $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        } catch (\Throwable $th) {
            report($th);
            return [
                'success' => false,
                'message' => $th->getMessage()
            ];
        }
    }
}
