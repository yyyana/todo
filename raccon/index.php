<?php
define("DOCROOT", $_SERVER["DOCUMENT_ROOT"]."/");
define("VIEW_PATH", DOCROOT."views/");
define("CONTROLLER_PATH", DOCROOT."controllers/");

$requests= explode("?",$_SERVER["REQUEST_URI"]);
$page=$requests[0];

$ROUTES=[
    "/"             =>["ctrl"=>"main",  "action"=>"index"],
    "/add"          =>["ctrl"=>"add",   "action"=>"index"],
    "/add/image"    =>["ctrl"=>"add",   "action"=>"add"],
    "/all"          =>["ctrl"=>"show",  "action"=>"all"],
    "/about"        =>["ctrl"=>"show",   "action"=>"about"],
    "/delete"        =>["ctrl"=>"show",   "action"=>"delete"],
    "/register"     =>["ctrl"=>"main",   "action"=>"register"],
    "/login"        =>["ctrl"=>"main",   "action"=>"login"],
    "/auth/register"=>["ctrl"=>"auth", "action"=>"register"],
    "/auth/login"   =>["ctrl"=>"auth", "action"=>"login"],
    "/auth/logout"  =>["ctrl"=>"auth", "action"=>"logout"]
];
include DOCROOT."auth.php";
include DOCROOT . "databases.json";

function redirect($page){
    header("Location:{$page}");
}

function load_model($model_name){
    include DOCROOT."model/{$model_name}.php";
}

function load_view($page, $data=[]){
    extract($data);
    $file = VIEW_PATH."view_{$page}.php";
    include DOCROOT."template.php";
}

function route($page){
    global $ROUTES;
  if(isset($ROUTES["$page"])){
      include CONTROLLER_PATH."control_".$ROUTES[$page]["ctrl"].".php";
      call_user_func("action_".$ROUTES[$page]["action"]);
  }
}
route($page);


