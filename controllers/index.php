<?php
class Index extends Controller
{
    function __Construct()
    {
    }

    function home()
    {
        $personInfo = $this->model->getPersonInfo();    //get all person from Model
        $personCount = count($personInfo);
        $values = [$personInfo, '', '', $personCount];
        $this->view('index/home', $values);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $form = $_POST;
            $personInfo = $this->model->getPersonInfo();
            $errorInfos = $this->model->checkInput($form);
            $personCount = count($personInfo);
            $values = [$personInfo, $errorInfos, $form,$personCount];
            if (sizeof($errorInfos) > 0) {
                $this->view('index/home', $values);
            } else {
                $this->model->pushPerson($form);
                header('location:' . URL . 'index/home');
            }
        }
    }

    public function delete($id = "")
    {
        if (isset($_POST['delete_group'])) {
            $deletes = $_POST['delete_group'];
            foreach ($deletes as $delete) {
                $done = $this->model->personDelete($delete);
            }
            header('location:' . URL . 'home/index');
        }
        $done = $this->model->personDelete($id);
        header('location:' . URL . 'index/home');
    }

    public function search()
    {
        $form = $_POST;
        $personInfoFilter = $this->model->getPersonFilter($form);
        $plzCount = count($personInfoFilter);
        $values = [$personInfoFilter, '', '', $plzCount];
        $this->view('index/home', $values);
    }
}
