<?php
    function decrypt($s) {
        $cryptKey    ='d8578edf8458ce06fbc5bb76a58c5ca4';
        $qDecoded    =rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($s), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return($qDecoded);
    }
?>