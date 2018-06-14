<?php

class DeviceManagesModel extends BaseModel {

    private $tableName = "DeviceManages";

    function __construct() {
        parent::__construct();
    }

    public function getAll($table = null) {
        $data = parent::getAll($this->tableName);
        return $this->pagination($data);
    }

    public function getById($id, $table = null) {
        return parent::getById($id, $this->tableName);
    }

    public function getByColumn($colName, $value, $table = null) {
        $data = parent::getByColumn($colName, $value, $this->tableName);
        return $this->pagination($data);
    }

    public function getByColumns($arr, $table = null) {
        return parent::getByColumns($arr, $this->tableName);
    }

    public function insert($data, $table = null) {
        return parent::insert($data, $this->tableName);
    }

    public function updateById($data, $id, $table = null) {
        return parent::updateById($data, $id, $this->tableName);
    }

    public function deleteById($id, $table = null) {
        return parent::deleteById($id, $this->tableName);
    }

    public function exeSQL($str) {
        return parent::exec($str);
    }

    public function getAllColumsTable($table = null) {
        return parent::getAllColumsTable($this->tableName);
    }

    public function getAllTables() {
        return parent::getAllTables();
    }

    /**
     * This method using for pagination pages
     * @param type $data
     * @return type
     */
    private function pagination($data) {
        $page = new HTPagination();
        $page->arr = $data;
        $page->offset = 10;
        $page->limit = 1;
        return array(
            'limit' => $page->getLimit(),
            'offset' => $page->getOffset(),
            'pages' => $page->getPage(),
            'element' => $page->getCount(),
            'data' => $data,
        );
    }

}