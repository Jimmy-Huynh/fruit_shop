
<?php

class categorysController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $model = new categorysModel();
        $data = array(
            'categorys' => $model->getAll()
        );
        $this->view->render('categorys/index', $data);
    }

    public function detail($id) {
        $model = new categorysModel();
        $data = array(
            'category' => $model->getById($id)[0]
        );
        $this->view->render('categorys/detail', $data);
    }

    public function create() {

        if (parent::getData()) {
            $model = new categorysModel();
            $data = array();
            if (isset($this->ID)) {
                $data["ID"] = $this->ID;
            }
            if (isset($this->NAME)) {
                $data["NAME"] = $this->NAME;
            }
            
            if ($model->insert($data)) {
                header("Location: " . SITE_ROOT . 'categorys');
                die();
            } else {
                $this->view->render('categorys/create_update', array('result' => false));
            }
        } else {
            $this->view->render('categorys/create_update');
        }
    }

    //get
    public function update($id) {
        $model = new categorysModel();
        if (parent::getData()) {
            $data = array();
            if (isset($this->ID)) {
                $data["ID"] = $this->ID;
            }
            if (isset($this->NAME)) {
                $data["NAME"] = $this->NAME;
            }
            
            if ($model->updateById($data, $id)) {
                $data1 = array(
                    'category' => $model->getById($id)[0],
                    'result' => true
                );
                $this->view->render('categorys/create_update', $data1);
            } else {
                $this->view->render('categorys/create_update', array('result' => false));
            }
        } else {
            $data = array(
                'category' => $model->getById($id)[0]
            );
            $this->view->render('categorys/create_update', $data);
        }
    }

    public function delete($id) {
        $model = new categorysModel();
        $data = array(
            'delete' => $model->deleteById($id)
        );
        $this->view->render('categorys/delete', $data);
    }

    public function search() {
        $data = array();
        $model = new categorysModel();
        if (parent::getData()) {
            $arr = array();
            if (isset($this->ID) && $this->ID != "") {
                $data["ID"] = $this->ID;
                $arr["ID"] = $this->ID;
            }
            if (isset($this->NAME) && $this->NAME != "") {
                $data["NAME"] = $this->NAME;
                $arr["NAME"] = $this->NAME;
            }
            
            if (count($arr) > 0) {
                $data["categorys"] = $model->getByColumns($arr);
                $data["search"] = true;
            } else {
                $data["categorys"] = $model->getAll();
            }
        } else {
            $data["categorys"] = $model->getAll();
        }
        $this->view->render('categorys/index', $data);
    }

}
