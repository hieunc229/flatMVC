<?php
namespace Engine;
use Wizard as Wizard;
// URL Router
class Router {

    // Registed areas
    private $areas = array();

    // Constructor
    public function __construct() { }

    // URL detect
    public function get($url) {

        $controllerWizard = $this->controllerWizard($url);
        $namespace  = $controllerWizard['namespace'];
        $controller = $controllerWizard['controller'];
        $action     = $controllerWizard['action'];
        $args       = $controllerWizard['args'];

        $dispatch = new $namespace($controller,$action);

        if ((int)method_exists($namespace, $action)) {
            call_user_func_array(array($dispatch,$action),$args);
        } else {
            throw new Wizard\Error('URL Not Found!', 404);
        }
    }

    public function setAreas($areas) {
        $this->areas = $areas;
    }

    // This wizard is used to defind a Controller from URL

        // This wizard is used to defind a Controller from URL
        public function controllerWizard($url) {
            $url        = str_replace("/", "\\", $url);
            $urls       = explode("\\", $url);
            $namespace  = '';
            $controller = '';
            $action     = '';

            if(sizeof($urls) < 2) {
                throw new Wizard\Error('URL Not Found!', 404);
            }

            if(array_key_exists($urls[0], $this->areas)) {
                $namespace  .= $this->areas[$urls[0]];
                array_shift($urls);

                $controller  = ucwords($urls[0]);
                $namespace  .= $controller;
                array_shift($urls);

                $action     .= ucwords($urls[0]);
                array_shift($urls);

            } else {
                $namespace  .= $this->areas['default'];
                $controller  = $urls[0];
                $namespace  .= $controller;
                array_shift($urls);

                $action     .= ucwords($urls[0]);
                array_shift($urls);
            }

            //echo $controller;
            //echo $action;
            //echo $namespace . $controller;
            if (empty($namespace))
                $namespace  = DEFAULT_NAMESPACE . DEFAULT_CONTROLLER;
            if (empty($controller))
                $controller = DEFAULT_CONTROLLER;
            if (empty($action))
                $action     = DEFAULT_ACION;

    		return array(
                        'namespace'     => $namespace,
                        'controller'    => $controller,
                        'action'        => $action,
                        'args'          => $urls
                    );
        }


    }
