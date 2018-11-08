<?php

namespace App\Services;

class Calculator {
    const PATTERN = '/(?:\-?\d+(?:\.?\d+)?[\+\-\*\/])+\-?\d+(?:\.?\d+)?/';
    const PARENTHESIS_DEPTH = 10;

    public function calculate($input) {
        if (strpos($input, '+') != null ||
            strpos($input, '-') != null ||
            strpos($input, '/') != null ||
            strpos($input, '*') != null) {

            if (strpos($input, '/')) {
                $checkValues = explode('/', $input);
                foreach ($checkValues as $value) {
                    if ($value == '0') {
                        return 'Impossível realizar divisão por zero';
                    }
                }
            }           

            //  Remove white spaces and invalid math chars
            $input = str_replace(',', '.', $input);
            $input = preg_replace('[^0-9\.\+\-\*\/\(\)]', '', $input);

            //  Calculate each of the parenthesis from the top
            $i = 0;
            while (strpos($input, '(') || strpos($input, ')')) {
                $input = preg_replace_callback('/\(([^\(\)]+)\)/', 'self::callback', $input);

                $i++;
                if($i > self::PARENTHESIS_DEPTH){
                    break;
                }
            }

            // To handle the special case of expressions surrounded by global parenthesis like "(1+1)"
            if (is_numeric($input)) {
                return $input;
            }
            //  Calculate the result
            if (preg_match(self::PATTERN, $input, $match)) {
                return $this->compute($match[0]);
            }

            return 0;
        }

        return $input;
    }

    private function compute($input){
        return 0 + eval('return '.$input.';');
    }

    private function callback($input){
        if(is_numeric($input[1])){
            return $input[1];
        }
        elseif(preg_match(self::PATTERN, $input[1], $match)){
            return $this->compute($match[0]);
        }

        return 0;
    }
}