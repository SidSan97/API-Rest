<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use function PHPUnit\Framework\returnSelf;

class ValidaCpf implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $validaCPF = true;

        $cpfRespMat = preg_replace( '/[^0-9]/is', '', $value );

        if (strlen($cpfRespMat) != 11) {
            $validaCPF = false;
        }

        if (preg_match('/(\d)\1{10}/', $cpfRespMat)) {
            $validaCPF = false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpfRespMat[$c] * (($t + 1) - $c);
                }
            $d = ((10 * $d) % 11) % 10;
            if ($cpfRespMat[$c] != $d) {
                $validaCPF = false;
            }
        }

        if($validaCPF == true)
            return($value);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Insira um CPF válido!';
    }
}
