<?php

function get_view($view_name){
    $view = VIEWS.$view_name.'View.php';
    if(!is_file($view)){
        die('Vista no encontrada...');
    }else{
        require_once $view;
    }
};