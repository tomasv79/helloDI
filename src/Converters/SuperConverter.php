<?php

declare(strict_types=1);

namespace App\Converters;

class SuperConverter extends AbstractConverter implements ConverterInterface
{
    //omg.. I didn't write this.. AI did!.. It's his fault!!!
    public function convert(string $input): string
    {
        $output = '';
        for ($i = 0; $i < strlen($input); $i++) {
            if (ctype_alpha($input[$i])) {
                if (ctype_lower($input[$i])) {
                    $output .= ord($input[$i]) - ord('a') + 1;
                } else {
                    $output .= ord($input[$i]) - ord('A') + 1;
                }
            } else {
                $output .= $input[$i];
            }
            if ($i != strlen($input) - 1) {
                $output .= '/';
            }
        }

        return $output;
    }
}
