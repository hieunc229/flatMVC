<?php
namespace App\Controllers;
use Engine\BaseController as Controller;

class Home extends Controller {

    public function __construct($controller, $action) {
      parent::__construct($controller, $action);
    }

    public function Index() {
      $this->view->render('index', false);
    }

    public function Show($args) {
        $this->view->render('show', false);
    }
}
