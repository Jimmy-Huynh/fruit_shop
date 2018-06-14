
<?php

class DeviceManagesController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $model = new DeviceManagesModel();
        $data = array(
            'devicemanages' => $model->getAll()
        );
        $this->view->render('devicemanages/index', $data);
    }

    public function detail($id) {
        $model = new DeviceManagesModel();
        $data = array(
            'devicemanage' => $model->getById($id)[0]
        );
        $this->view->render('devicemanages/detail', $data);
    }

    public function create() {

        if (parent::getData()) {
            $model = new DeviceManagesModel();
            $data = array();
            if (isset($this->Id)) {
                $data["Id"] = $this->Id;
            }
            if (isset($this->UserId)) {
                $data["UserId"] = $this->UserId;
            }
            if (isset($this->DeviceId)) {
                $data["DeviceId"] = $this->DeviceId;
            }
            if (isset($this->Status)) {
                $data["Status"] = $this->Status;
            }
            if (isset($this->RequestTime)) {
                $data["RequestTime"] = $this->RequestTime;
            }
            if (isset($this->ResponseTime)) {
                $data["ResponseTime"] = $this->ResponseTime;
            }
            if (isset($this->UserIdApprove)) {
                $data["UserIdApprove"] = $this->UserIdApprove;
            }
            
            if ($model->insert($data)) {
                header("Location: " . SITE_ROOT . 'DeviceManages');
                die();
            } else {
                $this->view->render('devicemanages/create_update', array('result' => false));
            }
        } else {
            $this->view->render('devicemanages/create_update');
        }
    }

    //get
    public function update($id) {
        $model = new DeviceManagesModel();
        if (parent::getData()) {
            $data = array();
            if (isset($this->Id)) {
                $data["Id"] = $this->Id;
            }
            if (isset($this->UserId)) {
                $data["UserId"] = $this->UserId;
            }
            if (isset($this->DeviceId)) {
                $data["DeviceId"] = $this->DeviceId;
            }
            if (isset($this->Status)) {
                $data["Status"] = $this->Status;
            }
            if (isset($this->RequestTime)) {
                $data["RequestTime"] = $this->RequestTime;
            }
            if (isset($this->ResponseTime)) {
                $data["ResponseTime"] = $this->ResponseTime;
            }
            if (isset($this->UserIdApprove)) {
                $data["UserIdApprove"] = $this->UserIdApprove;
            }
            
            if ($model->updateById($data, $id)) {
                $data1 = array(
                    'devicemanage' => $model->getById($id)[0],
                    'result' => true
                );
                $this->view->render('devicemanages/create_update', $data1);
            } else {
                $this->view->render('devicemanages/create_update', array('result' => false));
            }
        } else {
            $data = array(
                'devicemanage' => $model->getById($id)[0]
            );
            $this->view->render('devicemanages/create_update', $data);
        }
    }

    public function delete($id) {
        $model = new DeviceManagesModel();
        $data = array(
            'delete' => $model->deleteById($id)
        );
        $this->view->render('devicemanages/delete', $data);
    }

    public function search() {
        $data = array();
        $model = new DeviceManagesModel();
        if (parent::getData()) {
            $arr = array();
            if (isset($this->Id) && $this->Id != "") {
                $data["Id"] = $this->Id;
                $arr["Id"] = $this->Id;
            }
            if (isset($this->UserId) && $this->UserId != "") {
                $data["UserId"] = $this->UserId;
                $arr["UserId"] = $this->UserId;
            }
            if (isset($this->DeviceId) && $this->DeviceId != "") {
                $data["DeviceId"] = $this->DeviceId;
                $arr["DeviceId"] = $this->DeviceId;
            }
            if (isset($this->Status) && $this->Status != "") {
                $data["Status"] = $this->Status;
                $arr["Status"] = $this->Status;
            }
            if (isset($this->RequestTime) && $this->RequestTime != "") {
                $data["RequestTime"] = $this->RequestTime;
                $arr["RequestTime"] = $this->RequestTime;
            }
            if (isset($this->ResponseTime) && $this->ResponseTime != "") {
                $data["ResponseTime"] = $this->ResponseTime;
                $arr["ResponseTime"] = $this->ResponseTime;
            }
            if (isset($this->UserIdApprove) && $this->UserIdApprove != "") {
                $data["UserIdApprove"] = $this->UserIdApprove;
                $arr["UserIdApprove"] = $this->UserIdApprove;
            }
            
            if (count($arr) > 0) {
                $data["devicemanages"] = $model->getByColumns($arr);
                $data["search"] = true;
            } else {
                $data["devicemanages"] = $model->getAll();
            }
        } else {
            $data["devicemanages"] = $model->getAll();
        }
        $this->view->render('devicemanages/index', $data);
    }

}
