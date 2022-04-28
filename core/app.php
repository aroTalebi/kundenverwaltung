<?php
class app
{
    public $controller = 'index';       //Default Controller
    public $method = 'home';           //Default Methode
    public $params = [];                //Data to methode
    //Router here beginn
    function __construct()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = $this->parseurl($url);
            $this->controller = $url[0];
            unset($url[0]);
            if (isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
            $this->params = array_values($url);
        }
        $controllerUrl = 'controllers/' . $this->controller . '.php';
        if (file_exists($controllerUrl)) {
            require($controllerUrl);
            $object = new $this->controller;
            $object->model($this->controller);
            if (method_exists($object, $this->method)) {
                $arr = [$object, $this->method];
                call_user_func_array($arr, $this->params);
            }
        }
    }
    function parseurl($url)                             //Explode URL to controller und methode und filter
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);   //URL should only the Address
        $url = strip_tags($url);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
    }
}
