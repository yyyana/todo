
<?php
define("DOCROOT", $_SERVER["DOCUMENT_ROOT"]."/");
define("VIEW_PATH", DOCROOT."views/");
define("CONTROLLER_PATH", DOCROOT."controllers/");

$requests= explode("?",$_SERVER["REQUEST_URI"]);
$page=$requests[0];

$ROUTES=[
    "/"             =>["ctrl"=>"main",  "action"=>"main"],
    "/add"          =>["ctrl"=>"main",   "action"=>"add"],
    "/get"        =>["ctrl"=>"main",   "action"=>"about"],
    "/remove"        =>["ctrl"=>"main",   "action"=>"remove"],
];


function redirect($page){
    header("Location:{$page}");
}

function load_model(){
    include DOCROOT."images.json";
}

function load_view($page, $data=[]){
    extract($data);
    $file = VIEW_PATH."view_{$page}.php";
    include DOCROOT."$file";
}

function route($page){
    global $ROUTES;
    if(isset($ROUTES["$page"])){
        include CONTROLLER_PATH."control_".$ROUTES[$page]["ctrl"].".php";
        call_user_func("action_".$ROUTES[$page]["action"]);
    }
}
route($page);


