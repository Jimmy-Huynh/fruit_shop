<?php

class SignUpController extends BaseController{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data =array(
            'nav' => 'SignUp'
        );
        $this->view->render('signup/index', $data);
    }
}
