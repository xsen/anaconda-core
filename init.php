<?php defined('SYSPATH') or die('No direct script access.');

Route::set('media', 'media(/<file>)', array('file' => '.+'))
    ->defaults(
        array(
            'controller' => 'Media',
            'file'       => null,
        )
    );
?>