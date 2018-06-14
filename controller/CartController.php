<?php

class CartController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(isset($_SESSION['myCart'])){
            $data = array(
              'products' => $_SESSION['myCart'],
                'nav' => 'Cart'
            );
        }else{
            $data = array(
                'products' => NULL,
                'nav' => 'Cart'
            );
        }
        $this->view->render('cart/index', $data);
    }

    public function addCart($id) {
        foreach ($GLOBALS['products'] as $key => $value) {
            if ($value['id'] == $id) {
                if (!isset($_SESSION['myCart'])) {
                    $_SESSION['myCart'] = array();
                }
                array_push($_SESSION['myCart'], $value);
            }
        }
        header("Location: " . SITE_ROOT . 'index/detail/' . $id);
        die();
    }
    
    public function deleteCart(){
        if (parent::getData()) {
            unset($_SESSION['myCart'][$this->id]);
            echo "OK";
        }else{
            
        }
        
    }

}
