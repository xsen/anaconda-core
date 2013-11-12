<?php defined('SYSPATH') or die( 'No direct script access.' );


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