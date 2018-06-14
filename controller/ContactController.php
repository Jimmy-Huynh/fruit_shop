<?php

class ContactController extends BaseController{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data =array(
            'nav' => 'Contact'
        );
        $this->view->render('contact/index', $data);
    }
}
