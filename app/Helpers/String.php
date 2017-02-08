<?php

if (!function_exists('capitalize')) {
    /**
     * Return capitalize string.
     *
     * @param $str
     *
     * @return mixed
     */
    function capitalize($str)
    {
        return preg_replace_callback('/^\s*(\S)/u', function ($m) {
            return mb_strtoupper($m[0], 'UTF-8');
        }, $str);
    }
}

if (!function_exists('capitalizeWords')) {
    /**
     * Return capitalize words.
     *
     * @param $str
     *
     * @return mixed
     */
    function capitalizeWords($str)
    {
        return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
    }
}