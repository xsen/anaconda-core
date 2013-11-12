<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Media extends Controller_Template {
    /**
     * Отдача браузеру JS и CSS файлов.
     * @return  void
     */
    public function action_index()
    {
        $file = $this->request->param('file');
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $file = substr($file, 0, -(strlen($ext) + 1));

        if ($file = Kohana::find_file('media', $file, $ext))
        {
            // Check if the browser sent an "if-none-match: <etag>" header, and tell if the file hasn't changed
            $this->check_cache(sha1($this->request->uri()).filemtime($file));

            // Send the file content as the response
            $this->ajax_response(file_get_contents($file));

            // Set the proper headers to allow caching
            $this->response->headers('content-type',  File::mime_by_ext($ext));
            $this->response->headers('last-modified', date('r', filemtime($file)));

        }
        else
        {
            throw new HTTP_Exception_404;
        }
    }
}
?>