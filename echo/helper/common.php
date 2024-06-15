<?php

if(!function_exists('dd')) {
    function dd(...$data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
    }
}

if (!function_exists('controller_path')) {
    function controller_path() {
        return "/echo/controller";
    }
}

?>