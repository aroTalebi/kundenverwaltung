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

    function checkInput($form){
        $errors=[];
        $formToken=$form['token'];

        if(Model::tokenGet($formToken)){                                //csrf token controll
            if(empty($form["name1"])){
                $errors['name1Empty']="Bitte schreiben Sie ihre Name ein";
            }else{
                $firstname=$this->validate($form["name1"]);
                if(!preg_match('/^[A-Za-z]+$/',$firstname)){
                    $errors['name1Invalid']="schreiben Sie gültige Zeichen ein";
                }
            }

            if(empty($form["lastname"])){
                $errors['lastnameEmpty']="Geben Sie eine Nachname ein";
            }else{
                $lastname=$this->validate($form["lastname"]);
                if(!preg_match('/^[A-Za-z]+$/',$lastname)){
                    $errors['lastnameInvalid']="Geben Sie gültige Zeichen ein";
                }
            }

            if(empty($form["city"])){
                $errors['cityEmpty']="Geben Sie ein Stadt ein";
            }else{
                $city=$this->validate($form["city"]);
                if(!preg_match('/^[A-Za-z]+$/',$city)){
                    $errors['cityInvalid']="Geben Sie gültige Zeichen ein";
                }
            }

            if(empty($form["address"])){
                $errors['addressEmpty']="Geben Sie eine Adresse ein";
            }else{
                $address=$this->validate($form["address"]);
                if(!preg_match('/^[A-Za-z0-9_.]+$/',$address)){
                    $errors['addressInvalid']="Geben Sie gültige Zeichen ein";
                }
            }

            if(empty($form["email"])){
                $errors['emailEmpty']="Geben Sie eine E-Mail-Adresse ein";
            }else{
                $email=$this->validateEmail($form["email"]);
                if($this->validateEmail($email)){
                    $errors['emailInvalid']="Geben Sie gültige Email ein";
                }
            }

            if(empty($form["phone"])){
                $errors['phoneEmpty']="Geben Sie Eine Telefon Nummer ein";
            }else{
                $phone=$this->validate($form["phone"]);
                if(!preg_match('/^[0-9]+$/',$phone)){
                    $errors['phoneInvalid']="Geben Sie gültige Zeichen ein (0-9)";
                }
            }

            $sql="SELECT * FROM addressbook_tbl WHERE email=?";
            $email=$form["email"];                          //check if email not exists
            $values=[$email];
            if($this->doExists($sql,$values)){
                $errors['emailExists']="E-Mail-Adresse wird bereits verwendet";
            }

        }
        return $errors;
    }
   
}
