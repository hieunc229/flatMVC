<?php
namespace Engine;

class BaseController {
  protected $controller;
  protected $action;
  protected $models;
  protected $view;
  protected $db;
  
  public function __construct($controller, $action) {
    $this->controller = $controller;
    $this->action = $action;
	$this->view = new BaseView();
  }
}
?>
