<?php

function activate_menu($menu)
{
    $ci = &get_instance();
    $className = $ci->router->fetch_class();
    return $className == $menu ? 'active' : '';
}

function activate_submenu($menu)
{
    $ci = &get_instance();
    $className = $ci->router->fetch_class();
    return $className == $menu ? 'show' : '';
}

function base_api($string = ''){
    $base = 'https://sarmila.lanishod.com'.@$string;

    return $base;
}

