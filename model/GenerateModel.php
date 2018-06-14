<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenerateModel
 *
 * @author huutam.huynh
 */
class GenerateModel extends BaseModel {
    public function __construct() {
        parent::__construct();
    }
    public function getAllTables() {
        return parent::getAllTables();
    }
    public function getAllColumsTable($table) {
        return parent::getAllColumsTable($table);
    }
    public function getAllForeignKeyInTable($table) {
        return parent::getAllForeignKeyInTable($table);
    }
    public function getAll($table) {
        return parent::getAll($table);
    }
}
