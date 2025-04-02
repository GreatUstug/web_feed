<?php
function validateLength($value)
{
    if (strlen($value) < 0) {
        return false;
    }
    if (strlen($value) > PHP_INT_MAX) {
        return false;
    }    
}

function validatedate($value)
{
    return((int) $value >= 0) && ((string)(int) $value === (string) $value);
}

function validateType($value, $type)
{
    switch ($type) {
        case 'int':
            return is_int($value);
        case 'string':
            return is_string($value);
        case 'array':
            return is_array($value);    
        default:
            throw new InvalidArgumentException("Unknown type: {$type}");
    }
}        
?>