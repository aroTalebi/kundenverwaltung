<?php
class Index extends Controller
{
    function index()
    {
        $personInfo = $this->model->getPersonInfo();
        $values = [$personInfo];
        $this->view('index/index', $values);
    }
}
