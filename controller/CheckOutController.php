<?php

class CheckOutController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (isset($_SESSION["loined"])) {
            $this->view->render('checkout/index');
        }else{
            header("Location: " . SITE_ROOT . 'Login');
        die();
        }
    }
}
