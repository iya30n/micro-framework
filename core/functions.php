<?php
use App\Core\Request;

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

function validateData($data){
    $data = htmlspecialchars(trim($data));
    if($data == null){
        redirect('/');
    }
    return $data;    
}

function request($key){
    return Request::get($key);
}