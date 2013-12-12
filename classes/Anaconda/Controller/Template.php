<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Абстрактный контроллер для шаблонного вывода данных
 *
 * @package    Anaconda
 * @category   Controller
 * @author     Evgeny Leshchenko
 */

abstract class Anaconda_Controller_Template extends Kohana_Controller_Template {

    /**
     * @var View  дефолтный шаблон вывода
     */
    public $template = 'layout/default';

    /**
     * @var array  Массив для вывода крошек
     */
    protected $_crumbs = array();

    /**
     * @var array  Массив JS файлов для подключения к шаблну
     */
    protected $_js_file = array(); // fasdf

    /**
     * @var array  Массив CSS файлов для подключения к шаблну
     */
    protected $_css_file = array();

    /**
     * Статический метод на проверку доступа к текущему контроллеру. Вызывается в методе before
     *
     * @return  Boolean
     */
    static public function has_access ()
    {
        return TRUE;
    }

    /**
     * Статический метод. Возрващает названия контроллера
     *
     * @return  string
     */
    static public function get_name ()
    {
        return 'Не указано';
    }

    /**
     * Автоматическая загрузка шаблона.
     * Проверка доступа к контроллеру методом $this::has_access
     *
     * @throws HTTP_Exception_403
     * @return  void
     */
    public function before ()
    {
        if ($this::has_access() === FALSE) throw new HTTP_Exception_403;

        ob_start();
        parent::before();
    }

    /**
     * Подключение JS и CSS файлов.
     * Загрузка крошек страницы.
     * Вывод результата в браузер.
     *
     * @return  void
     */
    public function after()
    {
        $this->attach_default_media_files();

        $this->template->_js_file  = implode(" \n", $this->_js_file);
        $this->template->_css_file = implode(" \n", $this->_css_file);

        $this->template->crumbs  = $this->_crumbs;
        $this->template->content = ob_get_clean();

        if ( Kohana::$environment !== Kohana::PRODUCTION ) {
            $this->template->content .= View::factory('profiler/stats');
        }

        parent::after();
    }

    /**
     * Добавление в очередь крошек
     *
 	 * @param  string  $name Название для отобржанеие
     * @param  string  $uri  Адрес для перехода
     *
     * @return  void
     */
    public  function add_crumb($name, $uri)
    {
        $this->_crumbs[] = array('name' => $name, 'uri' => $uri);
    }

    /**
     * Подключение JS и CSS файлов к шаблону
     *
     * @param  string  $file_path Название для отобржанеие
     *
     * @throws  View_Exception
     * @return  boolean
     */
    protected function attach_file ($file_path)
    {

        $_ext = pathinfo($file_path, PATHINFO_EXTENSION);

        $_file_name = basename($file_path, '.'.$_ext);
        $_file_directory = dirname($file_path);

        $_file_path = Kohana::find_file($_file_directory, $_file_name, $_ext);
        if ( !$_file_path ) throw new View_Exception( $file_path . " file not found" );

        switch ( $_ext ) {
            case 'css' :
            {
                $this->_css_file[] = HTML::style($file_path);
                break;
            }

            case 'js' :
            {
                $this->_js_file[] = HTML::script($file_path);
                break;
            }

            default :
            {
                return FALSE;
            }

        }

        return TRUE;
    }

    /**
     * Функция выводить в бразуер данные без авто подгрузки шаблонов
     * @param string view данные
     * @return  void
     */
    protected function ajax_response ($view)
    {
        ob_end_clean();
        $this->auto_render = FALSE;

        $this->response->body($view);
    }

    /**
     * Подключение дефлотных медиа данных
     * @return  void
     */
    protected function attach_default_media_files()
    {
        $media_files = array(

        );

        foreach ($media_files as $_file) {
            $this->attach_file($_file);
        }
    }
}

?>