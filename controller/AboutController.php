<?php
class AboutController extends BaseController{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data =array(
            'nav' => 'About'
        );
        $this->view->render('about/index', $data);
    }
}
