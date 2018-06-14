<?php

class UsersController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $user = new UsersModel();
        $data = array(
            'users' => $user->getAll()
        );
        $this->view->render('users/index', $data);
        
    }

    public function detail($id) {
        $user = new UsersModel();
        $data = array(
            'user' => $user->getById($id)[0]
        );
        $this->view->render('users/detail', $data);
    }

    public function create() {

        if (parent::getData()) {
            $user = new UsersModel();
            $data = array();
            if (isset($this->UserName)) {
                $data["UserName"] = $this->UserName;
            }
            if (isset($this->PassWord)) {
                $data["PassWord"] = $this->PassWord;
            }
            if (isset($this->Description)) {
                $data["Description"] = $this->Description;
            }
            if ($user->insert($data)) {
                header("Location: " . SITE_ROOT . 'Users');
                die();
            } else {
                $this->view->render('users/create_update', array('result' => false));
            }
        } else {
            $this->view->render('users/create_update');
        }
    }

    //get
    public function update($id) {
        $user = new UsersModel();
        if (parent::getData()) {
            $data = array();
            if (isset($this->UserName)) {
                $data["UserName"] = $this->UserName;
            }
            if (isset($this->PassWord)) {
                $data["PassWord"] = $this->PassWord;
            }
            if (isset($this->Description)) {
                $data["Description"] = $this->Description;
            }
            if ($user->updateById($data, $id)) {
                $data1 = array(
                    'user' => $user->getById($id)[0],
                    'result' => true
                );
                $this->view->render('users/create_update', $data1);
            } else {
                $this->view->render('users/create_update', array('result' => false));
            }
        } else {
            $data = array(
                'user' => $user->getById($id)[0]
            );
            $this->view->render('users/create_update', $data);
        }
    }

    public function delete($id) {
        $user = new UsersModel();
        $data = array(
            'delete' => $user->deleteById($id)
        );
        $this->view->render('users/delete', $data);
    }

    public function search() {
        $data = array();
        $user = new UsersModel();
        if (parent::getData()) {
            $arr = array();
            if (isset($this->Id) && $this->Id != "") {
                $data["Id"] = $this->Id;
                $arr["Id"] = $this->Id;
            }
            if (isset($this->UserName) && $this->UserName != "") {
                $data["UserName"] = $this->UserName;
                $arr["UserName"] = $this->UserName;
            }
            if (isset($this->Description) && $this->Description != "") {
                $data["Description"] = $this->Description;
                $arr["Description"] = $this->Description;
            }
            if (count($arr) > 0) {
                $data["users"] = $user->getByColumns($arr);
                $data["search"] = true;
            } else {
                $data["users"] = $user->getAll();
            }
        } else {
            $data["users"] = $user->getAll();
        }
        $this->view->render('users/index', $data);
    }

}
