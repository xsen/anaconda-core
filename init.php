<?php defined('SYSPATH') or die( 'No direct script access.' );

/**
 * Set Kohana ENV in local config file main
 */
Kohana::$environment = Kohana::$config->load('anaconda')->get('env', Kohana::$environment);


Route::set('default', '(<controller>(/<action>(/<id>)))')
    ->defaults(
        array(
            'controller' => 'Main',
            'action'     => 'index',
        )
    );

Route::set('media', 'media(/<file>)', array('file' => '.+'))
    ->defaults(
        array(
            'controller' => 'Media',
            'action'     => 'index',
            'file'       => null,
        )
    );
?>