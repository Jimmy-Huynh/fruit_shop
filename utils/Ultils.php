<?php

/**
 * Description of Ultils
 *
 * @author huutam.huynh
 */
class Ultils {

    /**
     * get all model in the model directory
     * @return type
     */
    public static function getModelList() {
        $path = $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['PHP_SELF']) . "/model";
        $path = str_replace("index.php/", "", $path);
        return Ultils::getFileListByPath($path, 'Model');
    }
    /**
     * get all Controller in the Controller directory
     * @return type
     */
    public static function getControllerList(){
        $path = $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['PHP_SELF']) . "/controller";
        return Ultils::getFileListByPath($path, 'Controller');
    }

    /**
     * get all file in path with type
     * @param type $path
     * @param type $type{Model, Controller, View}
     * @return array
     */
    private static function getFileListByPath($path, $type) {
        $result = array();
        foreach (glob($path . '/*' . $type . '.php') as $fileName) {
            array_push($result, basename($fileName));
        }
        return $result;
    }

}
