<?php

use Illuminate\Support\Str;

if (!function_exists('flash')) {
    function flash($status, $type = 'success')
    {
        session()->flash('status', $status);
        session()->flash('type', $type);

    }
}
if (!function_exists('replace_k')) {
    function replace_k($item)
    {
       return Str::replace(',', '.', $item);

    }
}
?>
