<?php

session_start();
//define constants SITE_ROOT
defined('SITE_ROOT') or define('SITE_ROOT', 'http://localhost/fruit_shop/');
defined('SITE_PATH') or define('SITE_PATH', dirname(__DIR__) . '/fruit_shop/');

//setup fakeData
$fakeData = require 'data/fakeData.php';
$products = $fakeData['products'];
$users = $fakeData['users'];

//require BaseController
require 'utils/db/Connection.php';
require 'controller/BaseController.php';
require 'utils/Ultils.php';
require 'utils/HTPagination.php';

//Load all model
foreach (Ultils::getModelList() as $value) {
    require 'model/' . $value;
}

/* @var $url array */
$url = isset($_GET['url']) ? $_GET['url'] : NULL;
$url = rtrim($url, '/');
$url = explode('/', $url);

if (empty($url[0])) {
    require 'controller/IndexController.php';
    $controller = new IndexController();
    $controller->index();
    return FALSE;
} else {
    loadPage($url);
}

/**
 * load page by url
 * @param type $url
 */
function loadPage($url) {
    $file = 'controller/' . $url[0] . 'Controller.php';
    if (file_exists($file)) {
        require $file;
        $con = $url[0] . 'Controller';
        $controller = new $con;
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                loadErrorPage();
            }
        } else if (isset($url[1])) {
            if (method_exists($controller, $url[1])) {
                if (need_params($controller, $url[1]) > 0) {
                    loadErrorPage();
                } else {
                    $controller->{$url[1]}();
                }
            } else {
                loadErrorPage();
            }
        } else {
            $controller->index();
        }
    } else {
        loadErrorPage();
    }
}

/**
 * load Error page
 * @return boolean
 */
function loadErrorPage() {
    require 'controller/ErrorController.php';
    $controller = new ErrorController();
    $controller->index();
    return FALSE;
}

/**
 * check number param of method
 * @param type $class
 * @param type $name
 * @return type
 */
function need_params($class, $name) {
    $reflection = new ReflectionMethod($class, $name);
    return $reflection->getNumberOfParameters();
}
