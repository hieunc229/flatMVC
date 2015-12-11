<?php
namespace Engine;
use Engine as Engine;

class Bootstrap {

	private $router;
	private $areas;
	private $url;

	public function __construct($url) {
		$this->url = $url;
		$this->areas = $this->getRegistedArea();
	}

	public function init() {
		$this->router = new Engine\Router();
		$this->router->setAreas($this->getRegistedFolder());
		$this->router->get($this->url);
	}

	public function loader($class) {
		$path = $this->classWizard($class);
		include($path);
	}

	// Used for define class location form a class name
	private function classWizard($class) {
		$class = str_replace('\\','/',$class);
        $classParts = explode("/", $class);

		$path = ROOT_DIR;
        if(array_key_exists($classParts[0], $this->areas)) {
			$path .= $this->areas[$classParts[0]];
			$path .= ucfirst(str_replace($classParts[0] .'/', '/', $class));

        } elseif (array_key_exists($classParts[1], $this->areas)) {
			$path .= $this->areas[$classParts[1]];
			$path .= '/'. ucfirst($classParts[2]);


		} else $path .= $class;

		return $path . '.php';
    }

	private function getRegistedArea() {
     return array(
        // Areas
        'AdminArea' => 'areas/admin',
        // System
        'Engine' => 'engine',
		'Wizard' => 'wizard',
        // Default
        'Controllers' => 'app/controllers',
        'Models' => 'app/models',
        'Views' => 'app/views'
        );
    }

	private function getRegistedFolder(){
		return array(
			//areas
			'admin' => 'Areas\Admin\Controllers\\',
			'support' => 'Areas\Support\Controllers\\',
			'default' => 'App\Controllers\\'
		);
	}

}
