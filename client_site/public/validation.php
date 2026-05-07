<?php

function validateText($text, $min, $max) {
    $length = strlen(trim($text));
    return ($length >= $min && $length <= $max);
}

function validateNumber($num, $min, $max) {
    return (is_numeric($num) && $num >= $min && $num <= $max);
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateOption($option, $allowed) {
    return in_array($option, $allowed);
}

?>