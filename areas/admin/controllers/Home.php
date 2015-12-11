<?php
namespace Areas\Admin\Controllers;

class Home extends AreaController {

    public function __construct($controller, $action) {
      parent::__construct($controller, $action);
    }

    public function index() {
      $this->view->render('index', false);
    }

    public function x($arg) {
        echo $arg;
    }
}
?>
