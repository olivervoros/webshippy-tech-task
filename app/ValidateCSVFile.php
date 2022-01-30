<?php

namespace WebshippyTechTask;

use WebshippyTechTask\Interfaces\ValidateCSVFileInterface;

class ValidateCSVFile implements ValidateCSVFileInterface
{

    public function validate($stock): bool
    {
        if (func_num_args() !== 1) {
            throw new \Exception('Ambiguous number of parameters');
        }

        json_decode($stock);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception( 'Invalid json!');
        }

        return true;
    }


}
