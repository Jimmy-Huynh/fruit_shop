<?php

class BaseModel {

    public $db;
    private $databaseName;

    public function __construct() {
        $main = require('config/config.php');
        $this->databaseName = $main['dbname'];
        $this->db = new Connection();
    }

    public function getAllTables() {
        $req = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.tables WHERE TABLE_SCHEMA = '" . $this->databaseName . "'";
        return $this->exec($req);
    }

    public function getAllColumsTable($table) {
        $req = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . $this->databaseName . "' AND TABLE_NAME = '" . $table . "'";
        return $this->exec($req);
    }
    
    public function getTypeColumn($columnName, $table) {
        $req = "SELECT DATA_TYPE FROM information_schema.COLUMNS WHERE TABLE_NAME = '".$table."' AND COLUMN_NAME = '".$columnName."'";
        return $this->exec($req);
    }

    /**
     * one to many
     * @param type $table
     * @return type
     */
    public function getAllForeignKeyInTable($table) {
        $req = "SELECT 
                    TABLE_NAME,COLUMN_NAME,CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME
                FROM
                    INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE
                    REFERENCED_TABLE_SCHEMA = '" . $this->databaseName . "' AND
                    REFERENCED_TABLE_NAME = '" . $table . "'";
        return $this->exec($req);
    }

    public function getAll($table) {

        $req = "Select * from " . $table;
//        $foreignKey = $this->getAllForeignKeyInTable($table);
//        if (count($foreignKey) > 0) {
//            $result = array();
//            foreach ($this->exec($req) as $key => $value) {
//                $filedName = $foreignKey[0]->TABLE_NAME;
//                $value->$filedName = $this->getByColumnInternal($foreignKey[0]->COLUMN_NAME, $value->Id, $filedName);
//                array_push($result, $value);
//            }
//            return $result;
//        } else {
//            return $this->exec($req);
//        }
        return $this->exec($req);
    }
    private function getByColumnInternal($colName, $value, $table){
        $req = "SELECT * FROM $table WHERE $colName = '" . $value . "'";
        return $this->exec($req);
    }

    public function getById($id, $table) {
        $req = "SELECT * FROM $table WHERE Id = '" . $id . "'";
        return $this->exec($req);
    }

    public function getByColumn($colName, $value, $table) {
        $req = "SELECT * FROM $table WHERE $colName = '" . $value . "'";
        return $this->exec($req);
    }

    public function getByColumns($arr, $table) {
        $condition = "";
        foreach ($arr as $key => $value) {
            if($value != ''){
                $condition .= $key . " LIKE '%" . $value . "%' AND ";
            }
        }
        $condition = substr($condition, 0, -5);
        $req = "SELECT * FROM $table WHERE " . $condition;
        return $this->exec($req);
    }

    public function deleteById($id, $table) {
        $req = "DELETE FROM " . $table . " WHERE Id = '" . $id . "'";
        return $this->exec($req);
    }

    public function insert($data, $table) {
        $req = "INSERT INTO " . $table . " (";
        $col = "";
        $val = "";

        foreach ($data as $key => $value) {
            $col .= $key . ", ";
            $val .= "'" . $value . "', ";
        }
        $col = substr($col, 0, -2);
        $val = substr($val, 0, -2);
        $req .= $col . ') VALUES (' . $val . ')';
        return $this->exec($req);
    }

    public function updateById($data, $id, $table) {
        $req = "UPDATE " . $table . " SET ";
        $val = "";
        foreach ($data as $key => $value) {
            $val .= $key . " = '" . $value . "', ";
        }
        $val = substr($val, 0, -2);
        $req .= $val . " WHERE Id = '" . $id . "'";
        return $this->exec($req);
    }

    public function exec($req) {
        $sql = $this->db->prepare($req);
        if ($sql->execute()) {
            if ($this->is_insert_into($sql->queryString)) {
                return TRUE;
            } else if ($this->is_update_delete($sql->queryString)) {
                if ($sql->rowCount() > 0) {
                    return TRUE;
                }
                return FALSE;
            } else {
                $data = $sql->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            }
        } else {
            return FALSE;
        }
    }

    public function is_insert_into($sql) {
        $req = explode(' ', $sql);

        if (strtoupper($req[0]) == "INSERT" AND strtoupper($req[1]) == "INTO") {
            return true;
        }
        return false;
    }

    public function is_update_delete($sql) {
        $req = explode(' ', $sql);

        if ((strtoupper($req[0]) == "UPDATE" AND strtoupper($req[2]) == "SET") || (strtoupper($req[0]) == "DELETE")) {
            return true;
        }
        return false;
    }

}
