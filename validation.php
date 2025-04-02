<?php
function validateLength($Value)
{
    if (strlen($Value) < 0) {
        return false;
    }
    if (strlen($Value) > PHP_INT_MAX) {
        return false;
    }
}

function validatedate($Value)
{
    return ((int) $Value >= 0) && ((string)(int) $Value === (string) $Value);
}

function validateType($Value, $Type)
{
    switch ($Type) {
        case 'int':
            return is_int($Value);
        case 'string':
            return is_string($Value);
        case 'array':
            return is_array($Value);
        default:
            throw new InvalidArgumentException("Unknown type: {$Type}");
    }
}
