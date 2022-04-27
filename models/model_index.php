<?php

class model_index extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getPersonInfo()
    {
        $sql="SELECT * FROM kunde";
        $userInfo=$this->doSelect($sql);
        if(isset($userInfo)){
            return $userInfo;
        }
    }
   
}
