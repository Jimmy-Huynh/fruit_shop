<?php

class LogoutController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        session_destroy();
        header("Location: ".SITE_ROOT);
        die();
    }

}
