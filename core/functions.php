<?php

function dd(...$somthing)
{
    echo '<pre>';
    var_dump($somthing);
    echo '</pre>';
    die();
}

function view($view, $data = [])
{
    extract($data);
    require "app/views/{$view}.view.php";
}

function redirect($path)
{
    header("location: {$path}");
}
