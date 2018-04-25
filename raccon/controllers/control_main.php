<?php
function action_index(){
    load_view("main");
}
function action_register(){
    $errors=empty($_SESSION["reg_errors"])?[]:$_SESSION["reg_errors"];
    $old=empty($_SESSION["old_values"])?[]:$_SESSION["old_values"];
    $_SESSION["reg_errors"]=[];
    $_SESSION["old_values"]=[];
    load_view("register", ["errors"=>$errors, "old"=>$old]);
}
function action_login(){
    $errors=empty($_SESSION["login_errors"])?[]:$_SESSION["login_errors"];
    $old=empty($_SESSION["old_values"])?[]:$_SESSION["old_values"];
    $_SESSION["login_errors"]=[];
    $_SESSION["old_values"]=[];
    load_view("login", ["errors"=>$errors,"old"=>$old]);
}