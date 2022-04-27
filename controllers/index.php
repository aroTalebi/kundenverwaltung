<?php
class Index extends Controller
{
    function index()
    {
        $personInfo = $this->model->getPersonInfo();
        $values = [$personInfo];
        $this->view('index/index', $values);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $form = $_POST;
            //$personInfo = $this->model->getPersonInfo();
            $errorInfos = $this->model->checkInput($form);
            $values=[$personInfo,$errorInfos];
            if (sizeof($errorInfos) > 0) {
                $this->view('home/index', $values, 'no', 'no');
            }else{
                $this->model->putPerson($form);
                header('location:' . URL . 'home/index');
            }
        }
    }
}
