
<?php

class DevicesController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $model = new DevicesModel();
        $data = array(
            'devices' => $model->getAll()
        );
        $this->view->render('devices/index', $data);
//        $this->view->JSonRender($data);
    }

    public function detail($id) {
        $model = new DevicesModel();
        $data = array(
            'device' => $model->getById($id)[0]
        );
        $this->view->render('devices/detail', $data);
    }

    public function create() {

        if (parent::getData()) {
            $model = new DevicesModel();
            $data = array();
            if (isset($this->Id)) {
                $data["Id"] = $this->Id;
            }
            if (isset($this->DeviceCode)) {
                $data["DeviceCode"] = $this->DeviceCode;
            }
            if (isset($this->DeviceName)) {
                $data["DeviceName"] = $this->DeviceName;
            }
            if (isset($this->Status)) {
                $data["Status"] = $this->Status;
            }
            if (isset($this->Description)) {
                $data["Description"] = $this->Description;
            }
            
            if ($model->insert($data)) {
                header("Location: " . SITE_ROOT . 'Devices');
                die();
            } else {
                $this->view->render('devices/create_update', array('result' => false));
            }
        } else {
            $this->view->render('devices/create_update');
        }
    }

    //get
    public function update($id) {
        $model = new DevicesModel();
        if (parent::getData()) {
            $data = array();
            if (isset($this->Id)) {
                $data["Id"] = $this->Id;
            }
            if (isset($this->DeviceCode)) {
                $data["DeviceCode"] = $this->DeviceCode;
            }
            if (isset($this->DeviceName)) {
                $data["DeviceName"] = $this->DeviceName;
            }
            if (isset($this->Status)) {
                $data["Status"] = $this->Status;
            }
            if (isset($this->Description)) {
                $data["Description"] = $this->Description;
            }
            
            if ($model->updateById($data, $id)) {
                $data1 = array(
                    'device' => $model->getById($id)[0],
                    'result' => true
                );
                $this->view->render('devices/create_update', $data1);
            } else {
                $this->view->render('devices/create_update', array('result' => false));
            }
        } else {
            $data = array(
                'device' => $model->getById($id)[0]
            );
            $this->view->render('devices/create_update', $data);
        }
    }

    public function delete($id) {
        $model = new DevicesModel();
        $data = array(
            'delete' => $model->deleteById($id)
        );
        $this->view->render('devices/delete', $data);
    }

    public function search() {
        $data = array();
        $model = new DevicesModel();
        if (parent::getData()) {
            $arr = array();
            if (isset($this->Id) && $this->Id != "") {
                $data["Id"] = $this->Id;
                $arr["Id"] = $this->Id;
            }
            if (isset($this->DeviceCode) && $this->DeviceCode != "") {
                $data["DeviceCode"] = $this->DeviceCode;
                $arr["DeviceCode"] = $this->DeviceCode;
            }
            if (isset($this->DeviceName) && $this->DeviceName != "") {
                $data["DeviceName"] = $this->DeviceName;
                $arr["DeviceName"] = $this->DeviceName;
            }
            if (isset($this->Status) && $this->Status != "") {
                $data["Status"] = $this->Status;
                $arr["Status"] = $this->Status;
            }
            if (isset($this->Description) && $this->Description != "") {
                $data["Description"] = $this->Description;
                $arr["Description"] = $this->Description;
            }
            
            if (count($arr) > 0) {
                $data["devices"] = $model->getByColumns($arr);
                $data["search"] = true;
            } else {
                $data["devices"] = $model->getAll();
            }
        } else {
            $data["devices"] = $model->getAll();
        }
        $this->view->render('devices/index', $data);
    }

}
