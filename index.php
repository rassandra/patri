<?php
// setup environment
ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('UTC');

// include DB passwords
require_once("pass.php");


// connect to DB
$conn = new PDO('mysql:host=localhost;dbname=andra_magazin_de_materiale', DB_USERNAME, DB_PASSWORD);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//$conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );

// test insert
/*
$conn->prepare("INSERT INTO `adminUsers` SET `username`=?, `password`=?")->execute([
    'test',
    md5('test'),
]);
*/

if ($_POST['username'] && $_POST['password']) {
    $smt = $conn->prepare("SELECT * FROM `adminUsers` WHERE `username`=? AND `password`=?");
    $smt->execute([
        $_POST['username'],
        md5($_POST['password']),
    ]);
    if ($smt->fetchAll()) {
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


