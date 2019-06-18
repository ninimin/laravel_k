<?php

namespace App;

class FizzBuzz{
    public function processNumber($input){
        if($input%3 == 0){
            return 'fizz';
        }
        return $input;
    }
}