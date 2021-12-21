<?php
/**
 * Astashenkov
*/

/**
 * Служебная функция, когда не устраивает dump
 *
 * @param  mixed $string
 */
function fn_print_r($string)
{
    if (!empty($string)) {
        echo "<pre>" . print_r($string) . "</pre>";
    }
}

/**
 * Служебная функция, когда не устраивает dd
 *
 * @param  mixed $string
 */
function fn_print_die($string)
{
    if (!empty($string)) {
        fn_print_r($string);
    }
    die();
}