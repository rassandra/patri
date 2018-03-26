<?php
// setup environment
ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('UTC');

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

if ($_POST['username'] && $_POST['password']) {
    $result = DB::connect()->getRow("SELECT * FROM `adminUsers` WHERE `username`=? AND `password`=?", [
        $_POST['username'],
        md5($_POST['password']),
    ]);

    if ($result) {        
        // TODO: salveaza id user, login time in sesiune

        $_SESSION["id_user"] = $result['id'];
        var_dump($_SESSION);

        $_SESSION['data'] = date('Y-m-d H:i:s');
        var_dump($_SESSION);
        // TODO: salvez in sesiune
        // TODO: redirect pt altceva
    }
    else {
        $message = "Nu ati bagat username/paswword corect";
        require("display-auth.php");    
    }
}
else {
    require("display-auth.php");
}
