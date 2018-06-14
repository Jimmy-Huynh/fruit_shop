<?php

require 'view/BaseView.php';

class BaseController {

    public $view;
    public $model;
    public function __construct() {
        $this->view = new BaseView();
    }

    public function getData() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key =>$value){
                $this->$key = $value;
            }
            return TRUE;
        }else{
            return FALSE;
        }
    }

}
