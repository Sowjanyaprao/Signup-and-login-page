<?php
session_start();
require_once __DIR__ . '/users.php';

class login extends users
{
    private $emailId = null;
    private $password = null;

    public function __construct($username, $password)
    {
        $this->emailId = strtolower($username);
        $this->password = md5($password);
    }

    public function verify() 
    {
        $returnVal = false;
        $usersArr = $this->users();
        if(count($usersArr) > 0) {
            if(array_key_exists($this->emailId,$usersArr)) {
                $pwd = $usersArr[$this->emailId];
                if(strcmp($pwd, $this->password) === 0) {
                    $returnVal = true;
                    $_SESSION['user_email'] = $this->emailId;
                }
            }
        }

        return $returnVal;
    }

}

?>