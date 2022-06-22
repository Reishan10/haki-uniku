<?php

function activate_menu($menu)
{
    $ci = &get_instance();
    $className = $ci->router->fetch_class();
    return $className == $menu ? 'active' : '';
}
