<?php

class users
{
    public function users()
    {
        $returnVal = array();
        $d = file_get_contents(__DIR__ ."/users.txt");
        if($d !== false) {
            $data = explode("\n", trim($d, "\n"));
            $usersArr = array();
            foreach ($data as $row => $data) {
                $tmpUser = explode('|', $data);
                $usr = strtolower($tmpUser[0]);
                $pwd = trim($tmpUser[1], "\r");
                $returnVal[$usr] = $pwd;
            }
        }

        return $returnVal;
    }
}

?>