<?php

// include DB passwords
require_once("pass.php");
require_once("utils/utils.php");


// connect to DB 
// TODO schimba baza de date

//$conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );

// test insert
/*
$conn->prepare("INSERT INTO `adminUsers` SET `username`=?, `password`=?")->execute([
    'test',
    md5('test'),
]);
*/

if ($_POST['email'] && $_POST['password']) {
    $result = DB::connect()->getRow("SELECT * FROM `adminUsers` WHERE `email`=? AND `password`=?", [
        $_POST['email'],
        md5($_POST['password']),
    ]);

    $_SESSION["login_tries"]+=1;
    // sleep(2 * $_SESSION["login_tries"]);

    if ($result) {        
        // TODO: salveaza id user, login time in sesiune

        $_SESSION["id_user"] = $result['id'];
        var_dump($_SESSION);

        $_SESSION['data'] = date('Y-m-d H:i:s');
        var_dump($_SESSION);
        // TODO: redirect pt altceva
    }
    else {
        $message = "Nu ati introdus email/paswword corect";
        require("display-login.php");    
    }
}
else {
    require("display-login.php");
}
