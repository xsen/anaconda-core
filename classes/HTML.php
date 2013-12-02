<?php defined('SYSPATH') OR die( 'No direct script access.' );

class HTML extends Kohana_HTML
{

    public static function alert ($text, $type = 'danger')
    {
        return View::factory('helpers/alert', array('text' => $text, 'type' => $type));
    }
}

?>