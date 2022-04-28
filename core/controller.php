<?php
class Controller{
    function view($viewUrl,$data=[])
    {
        require('links.php');
        require('views/'.$viewUrl.'.php'); 
    }
    function model($modelUrl)
    {
        require('models/model_'.$modelUrl.'.php');
        $className='model_'.$modelUrl;
        $this->model=new $className;
    }
}
