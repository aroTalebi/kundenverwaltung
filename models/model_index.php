<?php

class model_index extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getPersonInfo()
    {
        $sql = "SELECT * FROM kunde";
        $userInfo = $this->doSelect($sql);
        if (isset($userInfo)) {
            return $userInfo;
        }
    }

    public function pushPerson($form)
    {
        $name1 = $form["name1"];
        $name2 = $form["name2"];
        $strasse = $form["strasse"];
        $plz = $form["plz"];
        $ort = $form["ort"];

        $form = [$name1, $name2, $strasse, $plz, $ort];
        $sql = "INSERT INTO kunde (name1,name2,strasse,plz,ort) VALUES (?,?,?,?,?)";
        $this->doQuery($sql, $form);
        return true;
    }

    function checkInput($form)
    {
        $errors = [];
        $formToken = $form['token'];

        if (true) {                                //csrf token controll
            if (empty($form["name1"])) {
                $errors['name1Empty'] = "Bitte schreiben Sie ihre Name ein";
            } else {
                $lastname = $this->validate($form["name1"]);
                if (!preg_match('/^[A-Za-z]+$/', $lastname)) {
                    $errors['name1Invalid'] = "Schreiben Sie gültige Zeichen ein (A-Z a-z)";
                }
            }

            if (empty($form["name2"])) {
                $errors['name2Empty'] = "Bitte schreiben Sie ihre Vor-Name ein";
            } else {
                $firstname = $this->validate($form["name2"]);
                if (!preg_match('/^[A-Za-z]+$/', $firstname)) {
                    $errors['name2Invalid'] = "Schreiben Sie gültige Zeichen ein (A-Z a-z)";
                }
            }

            if (empty($form["strasse"])) {
                $errors['strasseEmpty'] = "Bitte schreiben Sie ihre Strasse ein";
            } else {
                $street = $this->validate($form["strasse"]);
                if (!preg_match('/^[A-Za-z0-9_.]+$/', $street)) {
                    $errors['strasseInvalid'] = "Schreiben Sie gültige Zeichen ein (A-Z a-z 0-9 .)";
                }
            }

            if (empty($form["plz"])) {
                $errors['plzEmpty'] = "Bitte schreiben Sie ihre Postleitzahl ein";
            } else {
                $plz = $this->validate($form["plz"]);
                if (!preg_match('/^[0-9_.]+$/', $plz)) {
                    $errors['plzInvalid'] = "Schreiben Sie gültige Zeichen ein (0-9)";
                }
            }

            if (empty($form["ort"])) {
                $errors['ortEmpty'] = "Bitte schreiben Sie ihre Ort ein";
            } else {
                $ort = $this->validate($form["ort"]);
                if (!preg_match('/^[A-Za-z]+$/', $ort)) {
                    $errors['ortInvalid'] = "Schreiben Sie gültige Zeichen ein (A-Z a-z)";
                }
            }
        }
        return $errors;
    }

    public function personDelete($id)
    {
        $sql = "DELETE FROM kunde WHERE kunde_id=?;";
        $value = [$id];
        $this->doDelete($sql, $value);
    }

    public function getPersonFilter($form)
    {
        $name1 = $form["name1"];
        $plz = $form["plz"];                       
        $values = [$name1, $plz];
        $sql = "SELECT * FROM kunde WHERE name1 LIKE ? OR plz LIKE ?;";
        $userInfoFilter = $this->doSelect($sql, $values);
        return $userInfoFilter;
    }
}
