<?php

class storeUsers
{
    private $emailId = null;
    private $password = null;

    public function __construct($emailId, $password)
    {
        $this->emailId = $emailId;
        $this->password = $password;
    }

    public function save()
    {
        $file = fopen(__DIR__ ."/users.txt", "a");
        $string = $this->emailId."|".$this->password."\n";
        fwrite($file, $string);
        fclose($file);
    }

}

?>