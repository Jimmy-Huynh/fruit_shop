<?php

class TestController extends BaseController{
    public function __construct() {
        parent::__construct();
    }
    public function test(){
        $this->view->render('test/test');
    }
}
