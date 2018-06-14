<?php

class LoginController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data =array(
            'nav' => 'Login'
        );
        $this->view->render('login/index', $data);
    }

    public function Login() {
        if (parent::getData()) {
            $isOk = FALSE;
            $userData = NULL;
            foreach ($GLOBALS['users'] as $key => $value) {
                if ($value['account'] == $this->user && $value['password'] == $this->pass) {
                    $isOk = TRUE;
                    $userData = $value;
                    break;
                }
            }
            if ($isOk) {
                //Storage session
                $_SESSION["loined"] = TRUE;
                $_SESSION["userData"] = $userData;
                header("Location: " . SITE_ROOT);
                die();
            } else {
                header("Location: " . SITE_ROOT . 'Login');
                die();
            }
        } else {
            header("Location: " . SITE_ROOT . 'Login');
            die();
        }
    }

}
