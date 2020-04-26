<?php

namespace App\Models;


class LinuxUser 
{
    public static function validate(string $username, string $password)
    {
        $shad =  preg_split("/[$:]/",`cat /etc/shadow | grep "^$username\:"`);
        // dump($shad);
        // use mkpasswd command to generate shadow line passing $pass and $shad[3] (salt)
        // split the result into component parts
        // $mkps = preg_split("/[$:]/",trim(`mkpasswd -m sha-512 $pass $shad[3]`));
        $mkps = preg_split("/[$:]/",trim(`openssl passwd -6 -salt $shad[3] $password`));
        // dump($mkps);
        // compare the shadow file hashed password with generated hashed password and return
        // return ($shad[4] == $mkps[3]);
        if($shad[4] == $mkps[3])
        {
            return true;
        } else {
            return false;
        } 
    }
}
