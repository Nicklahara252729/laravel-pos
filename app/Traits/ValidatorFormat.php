<?php

namespace App\Traits;

trait ValidatorFormat
{
    public function messageFormat($message)
    {
        $string_replace = array('\'', ';', '[', ']', '{', '}', '|', '"', '/');
        return str_replace($string_replace, '', $message);
    }
}
