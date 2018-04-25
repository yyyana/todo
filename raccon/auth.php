<?php
session_start();

function getUsersAll(){
    return DB_selectAll("users");
}
function saveUsersToArray($users){
    DB_insertToTable("users", $users);
}
function getUserByLogin($login){
    $user = DB_selectLimited("users","login=?",["{$login}"],1,0);
    $user=(!empty($user)&&is_array($user))? array_values($user)[0]:NULL;
    return @$user;
}
function createUser($login, $pass){
    return[
        "login"=> $login,
        "pass" => md5($pass)
    ];
}
function authRegister($login, $pass){
    if(getUserByLogin($login)!==null) return false;
    $new_user=createUser($login,$pass);
    saveUsersToArray($new_user);
    return true;
}
function authLogin($login, $pass){
    $user = getUserByLogin($login);
    if($user==null) return false;
    if($user["pass"]!==md5($pass)) return false;
    $_SESSION["auth_login"]=$login;
    $_SESSION["auth_ip_adress"]=md5($_SERVER["REMOTE_ADDR"]);
    $_SESSION["auth_browser"]=md5($_SERVER["HTTP_USER_AGENT"]);
    return true;
}
function authIsAuth(){
    if(empty($_SESSION["auth_login"])) return false;
    if(empty($_SESSION["auth_ip_adress"])|| $_SESSION["auth_ip_adress"]!= md5($_SERVER["REMOTE_ADDR"])) return false;
    if(empty($_SESSION["auth_browser"])|| $_SESSION["auth_browser"]!=md5($_SERVER["HTTP_USER_AGENT"])) return false;
    if(getUserByLogin($_SESSION["auth_login"])===null) return false;
    return true;
}
function authLogout(){
    session_destroy();
    $fav=(isset($_COOKIE["fav"]))? json_decode($_COOKIE["fav"], true): [];
    setcookie("fav",json_encode($fav), time()-1300, "/");
}
function authCurrentUser(){
    return getUserByLogin($_SESSION["auth_login"]);
}
