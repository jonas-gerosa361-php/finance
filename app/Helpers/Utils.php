<?php

namespace App\Helpers;

use App\Exceptions\ValidatorException;

class Utils
{
    public static function validateArgs(array $args, array $requiredFields): void
    {
        foreach ($requiredFields as $required) {
            if ($args[$required] === null) {
                throw new ValidatorException("O campo [$required] é obrigatório");
            }
        }
    }
}
