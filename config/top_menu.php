<?php defined('SYSPATH') or die( 'No direct script access.' );

return array(
    array(
        'url'         => '/',
        'name'        => Controller_Main::get_name(),
        'access'      => Controller_Main::has_access(),
        'controllers' => array('Main')
    )
);
?>