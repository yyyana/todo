<?php
function action_register(){
    $login = @$_POST["login"];
    $pass = @$_POST["pass"];
    $pass2 = @$_POST["pass2"];
    $errors = [];
    if(empty($login)) $errors["login"]="Поле пустое";
    if(empty($pass)) $errors["pass"]="Поле пустое";
    if(empty($pass2)) $errors["pass2"]="Поле пустое";
    if($pass!=$pass2) $errors["pass2"]="Поля разные";
    if(empty($errors)){
        if(!authRegister($login,$pass)) {$errors["login"]="Имя занято";}
    }
    if(!empty($errors)){
        $_SESSION["reg_errors"]=$errors;
        $_SESSION["old_values"]=$_POST;
        redirect("/register");
        return;
    }
    redirect("/login");
}
function action_login(){
    $login = @$_POST["login"];
    $pass = @$_POST["pass"];
    $errors = [];
    if(empty($login)) $errors["login"]="Поле пустое";
    if(empty($pass)) $errors["pass"]="Поле пустое";
    if(!authLogin($login,$pass)) {$errors["login"]="Попробуй еще";
        $errors["pass"]="Попробуй еще";}
    if(!empty($errors)){
        $_SESSION["login_errors"]=$errors;
        $_SESSION["old_values"]=$_POST;
        redirect("/login");
        return;}
    redirect("/");
}
function action_logout(){
    authLogout();
    redirect("/");
}