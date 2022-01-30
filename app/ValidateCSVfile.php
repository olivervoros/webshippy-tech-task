<?php

class ValidateCSVfile implements ValidateCSVFileInterface
{

    public function validate($input): bool
    {
        if ($_SERVER['argc'] !== 2) {
            throw new Exception('Ambiguous number of parameters');
        }

        if ((json_decode($_SERVER['argv'][1])) === null) {
            throw new Exception( 'Invalid json!');
        }

        return true;
    }

}
