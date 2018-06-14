<?php

class Connection extends PDO{
    public function __construct() {
        $main=require('config/config.php');
        foreach ($main['db'] as $key=>$value){
            switch ($key){
                case 'connectionString': $dsn=$value;
                    break;
                case 'username': $username=$value;
                    break;
                case 'passwd': $passwd=$value;
                    break;
            }
        }
        parent::__construct($dsn, $username, $passwd);
    }
}

?>
