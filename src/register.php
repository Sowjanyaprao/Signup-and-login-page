<?php

require_once __DIR__ . '/users.php';

class register extends users
{
    private $emailId = null;
    private $password = null;

    public function __construct($username, $password)
    {
        $this->emailId = strtolower($username);
        $this->password = $password;
    }

    public function checkDuplicate() 
    {
        $returnVal = false;
        $usersArr = $this->users();
        if(count($usersArr) > 0) {
            if(array_key_exists($this->emailId,$usersArr)) {
                $returnVal = true;
            }
        }

        return $returnVal;
    }

    public function save()
    {
        require_once __DIR__ . '/storeUsers.php';
        if(!$this->checkDuplicate()) {
            $clsStoreUsers = new storeUsers($this->emailId,md5($this->password));
            $clsStoreUsers->save();
        }
    }

}

?>