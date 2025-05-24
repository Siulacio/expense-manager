<?php

use Illuminate\Support\Str;

if (!function_exists('getModelName')) {
    function getModelName($model): string
    {
        return Str::snake(class_basename($model));
    }
}
