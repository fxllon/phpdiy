<?php
$pathInfo = !empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
$arr = explode('/', trim($pathInfo, '/'));

if (!isset($arr[2])) {
    exit('操作不存在');
}

list($module, $controller, $action) = $arr;

define('MODULE_PATH', '../' . $module . '/');

$controllerName = ucwords($controller) . 'Controller';
$controllerPath = MODULE_PATH . 'controller/' . $controllerName . '.php';
require $controllerPath;

$employee = new $controllerName();
$employee->$action();
