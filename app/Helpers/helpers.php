<?php

if(!function_exists('api')) {

    function api($array) {

        return response()->json($array);
    }


}
