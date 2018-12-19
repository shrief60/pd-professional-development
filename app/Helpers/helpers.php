<?php

if(!function_exists('api')) {

    function api($array) {

        return response()->json($array);
    }
}

if(!function_exists('getImageIcon')) {

    function getImageIcon($name, $subFolder = null)
    {

        return $subFolder ? asset("/images/icons/$name/$subFolder.png") : asset("/images/icons/{$name}.png");;
    }
}
