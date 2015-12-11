<?php
namespace Engine;

/**
 * BaseView
 */
class BaseView
{
    // $txt is used to save any varibles as text and pass to the view
    protected $txt;

    protected $viewPath;

    // $helper is class that use function generate HTML
    // need to be init when needed
    protected $helper;

    public function __construct() { }

    /* Use to set view title
    /* $title   : view title
    */
    public function title($val) {
        $this->txt['title'] = $val;
    }

    /* Use to set values used in view
    /* $key     : used in view as $this->txt[$key]
    /* $value   : value set
    */
    public function setValue($key, $val) {
        $this->txt[$key] = $val;
    }

    /* Use for detect and include view
    /* $action : view file name, usually similar with action name
    /* $temp   : choose either use the template or notß
    /* Note that template locate at views/shared/_layout.php
    */
    public function render($action, $temp = true) {
        $trace = debug_backtrace();

        $dirPath = str_replace('.php', DS , strtolower($trace[0]['file']));
        $filePath = str_ireplace('controllers', 'views', $dirPath);

        if($temp) {
            $urls = explode("/", $filePath);
            $this->viewPath = $filePath. $action . '.php';
            $file = str_replace($urls[count($urls)-2], "shared", $filePath) . '_layout.php';
        } else {
            $file = $filePath. $action . '.php';
        }

        include($file);
    }


}
