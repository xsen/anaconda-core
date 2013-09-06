<?php defined('SYSPATH') or die( 'No direct script access.' );

/**
 * Методы помошники для ядра:
 *
 *
 * @package    Anaconda
 * @category   Core
 * @author     Evgeny Leshchenko
 */

class Anaconda_Core extends Kohana_Core
{
    /**
     * Получение названия проекта
     * @return  string
     */

    public static function get_product_name ()
    {
        return Kohana::$config->load('anaconda')->get('product_name', 'Укажите имя продукта');
    }
}

?>